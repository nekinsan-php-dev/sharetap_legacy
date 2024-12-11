<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\BusinessHour;
use App\Models\EmailVerification;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Template;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Vcard;
use App\Models\VcardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;
use App\Models\SharetapPermission;

class UserDashboardController extends Controller
{
    public function login(){
        $registerImage = Setting::where('key', 'register_image')->value('value');
        return view('custom-views.user-dashboard.login',compact('registerImage'));
    }

    public function loginPost(Request $request): RedirectResponse
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to find the user by email
        $user = User::whereEmail($request->email)->first();

        if (!empty($user)) {
            // Check if the provided password matches the stored password
            if (Hash::check($request->password, $user->password)) {
                // Log the user in
                Auth::login($user);

                // Redirect to the intended page or home page
                return redirect()->intended('user/dashboard');
            } else {
                // Password mismatch
                Flash::error(__('auth.password'));
                return redirect()->back()->withInput()->withErrors(['password' => __('auth.password')]);
            }
        } else {
            // User not found
            Flash::error(__('auth.failed'));
            return redirect()->back()->withInput()->withErrors(['email' => __('auth.failed')]);
        }
    }

    public function dashboard(){
        $userData = session()->get('logged_user_data');
        $sharetapId = $userData->vcard->id ?? 1;
        $shareTapPermissions = SharetapPermission::where('vcard_id', $sharetapId)->first();

        return view('custom-views.user-dashboard.index',compact('userData', 'shareTapPermissions'));
    }

    public function basicInfo(){
        $user = User::find(auth()->id());
        return view('custom-views.user-dashboard.basic-info',compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('custom-views.user-dashboard.edit-profile',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user = User::find($user->id);
        $input = $request->all();
       if ($request->hasFile('profile_img')) {
           $user['profile_img'] = $this->handleImageUpload($request, 'profile_img', 'images/avatar.png');
           $input['profile_img'] = $user['profile_img'];

       }
       if($request->hasFile('cover_img')){
           $user['cover_img'] = $this->handleImageUpload($request, 'cover_img', 'images/avatar.png');
           $input['cover_img'] = $user['cover_img'];
       }

        $user->update($input);
        return redirect()->back()->with('success','Profile updated successfully');
    }

    private function handleImageUpload(Request $request, $inputName, $defaultPath)
    {
        if ($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);
            return url('uploads/' . $imageName);
        } else {
            return url($defaultPath);
        }
    }

    public function templates(){
        $user = User::find(auth()->id());
        $templates = Template::all();
        return view('custom-views.user-dashboard.templates',compact('user','templates'));
    }

    public function businessHours() {
        $user = User::find(auth()->id());

        // Get vcard_id
        $card = Vcard::where('user_id', $user->id)->first();
        $vcard_id = $card->id;

        // Fetch existing business hours
        $businessHours = BusinessHour::where('vcard_id', $vcard_id)->get()->keyBy('day_of_week');

        return view('custom-views.user-dashboard.business-hours', compact('user', 'businessHours'));
    }

    public function servicesView(){
        $user = User::find(auth()->id());
        $services = VcardService::where('vcard_id',$user->vcard->id)->get();
        return view('custom-views.user-dashboard.services',compact('user','services'));
    }

    public function testimonialsView(){
        $user = User::find(auth()->id());
        $testimonials = Testimonial::where('vcard_id',$user->vcard->id)->get();
        return view('custom-views.user-dashboard.testimonials',compact('user','testimonials'));
    }

    public function socialLinks(){
        $user = User::find(auth()->id());
        $socialLinks = SocialLink::where('vcard_id',$user->vcard->id)->first();
        return view('custom-views.user-dashboard.social-links',compact('user','socialLinks'));
    }

    public function gallery(){
        $user = User::find(auth()->id());
        return view('custom-views.user-dashboard.gallery',compact('user'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();


        return redirect('/');
    }

}
