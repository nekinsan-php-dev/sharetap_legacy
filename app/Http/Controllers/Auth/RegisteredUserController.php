<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRegisterRequest;
use App\Mail\VerifyMail;
use App\Mail\NewUserRegisteredMail;
use App\Models\AffiliateUser;
use App\Models\MultiTenant;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RegisteredUserController extends Controller
{
    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $registerImage = Setting::where('key', 'register_image')->value('value');

        if (!getSuperAdminSettingValue('register_enable')) {
            return redirect()->back();
        }

        return view('auth.register', ['registerImage' => $registerImage]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateRegisterRequest $request): RedirectResponse
    {
        $referral_code = $request->input('referral-code');
        $referral_user = '';
        if ($referral_code) {
            $referral_user = User::where('affiliate_code', $referral_code)->first();
        }
        try {
            DB::beginTransaction();

            $tenant = MultiTenant::create(['tenant_username' => $request->first_name]);
            $userDefaultLanguage = Setting::where('key', 'user_default_language')->first()->value ?? 'en';

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'region_code' =>  $request->region_code,
                'contact' =>  $request->contact,
                'language' => $userDefaultLanguage,
                'steps' => 0,
                'email_verified_at' => getSuperAdminSettingValue('user_verified_email') == 0 ? Carbon::now() : null,
                'password' => Hash::make($request->password),
                'tenant_id' => $tenant->id,
                'affiliate_code' => generateUniqueAffiliateCode(),
            ])->assignRole(Role::ROLE_ADMIN);

            $plan = Plan::whereIsDefault(true)->first();

            Subscription::create([
                'plan_id' => $plan->id,
                'plan_amount' => $plan->price,
                'plan_frequency' => $plan->frequency,
                'starts_at' => Carbon::now(),
                'ends_at' => Carbon::now()->addDays($plan->trial_days),
                'trial_ends_at' => Carbon::now()->addDays($plan->trial_days),
                'status' => Subscription::ACTIVE,
                'tenant_id' => $tenant->id,
                'no_of_vcards' => $plan->no_of_vcards,
            ]);

            if ($referral_user) {
                $affiliateUser = new AffiliateUser();
                $affiliateUser->affiliated_by = $referral_user->id;
                $affiliateUser->user_id = $user->id;
                $affiliateUser->amount = 0;
                $affiliateUser->save();
            }

            DB::commit();

            $token = Password::getRepository()->create($user);
            $data['url'] = config('app.url') . '/verify-email/' . $user->id . '/' . $token;
            $data['user'] = $user;

            if (getSuperAdminSettingValue('user_verified_email')) {
                Mail::to($user->email)->send(new VerifyMail($data));
            }
            if (getSuperAdminSettingValue('register_mail')) {
                Mail::to(getSuperAdminSettingValue('email'))->send(new NewUserRegisteredMail($user));
            }
            if (getSuperAdminSettingValue('user_verified_email')) {
            Flash::success(__('messages.placeholder.registered_success'));
            }else{
            Flash::success(__('messages.placeholder.user_registered_success'));
            }

            return redirect(route('login'));
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
