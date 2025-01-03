<?php

namespace App\Http\Controllers\CustomController;

use App\Http\Controllers\Controller;
use App\Models\BusinessHour;
use App\Models\FrontFAQs;
use App\Models\Gallery;
use App\Models\MultiTenant;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Setting;
use App\Models\SharetapPermission;
use App\Models\SocialLink;
use App\Models\Subscription;
use App\Models\Template;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Vcard;
use App\Models\VcardService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CardController extends Controller
{
    public function create(Request $request)
    {
        session()->put('selectedPlan', $request->plan ?? 1);
        $registerImage = Setting::where('key', 'register_image')->value('value');
        return view('custom-views.card.create', compact('registerImage'));
    }

    public function tempStore(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'mobile_number' => 'required|unique:users,contact',
            'location' => 'required',
        ]);

        $user = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'contact' => $validated['mobile_number'],
        ];

        $cardDetails = [
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['mobile_number'],
            'alternative_phone' => $request->alternate_mobile_number,
            'alternative_email' => $request->alternate_email,
            'occupation' => $request->occupation,
            'company' => $request->company_name,
            'location' => $request->location,
            'location_url' => $request->location_url,
            'enable_enquiry_form' => $request->enable_enquiry_form,
            'enable_download_qr_code' => $request->enable_download_qr_code,
            'show_qr_code' => $request->show_qr_code,
            'enable_contact' => $request->enable_contact,
            'whatsapp_share' => $request->whatsapp_share,
            'dob' => $validated['date_of_birth'],
            'description' => $request->description,
            'gender' => $validated['gender'],
        ];

        if ($cardDetails) {
            session()->put('card_details', $cardDetails);
        }

        if ($user) {
            session()->put('user_details', $user);

            return redirect()->route('card.temp-store-step-two')->with('success', 'User details saved successfully. Please select a template to proceed further.');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function updateBasicInfo(Request $request)
    {
        $cardDetails = [
            'name' => $request->first_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->mobile_number,
            'alternative_phone' => $request->alternate_mobile_number,
            'alternative_email' => $request->alternate_email,
            'occupation' => $request->occupation,
            'company' => $request->company_name,
            'location' => $request->location,
            'location_url' => $request->location_url,
            'enable_enquiry_form' => $request->enable_enquiry_form,
            'enable_download_qr_code' => $request->enable_download_qr_code,
            'show_qr_code' => $request->show_qr_code,
            'enable_contact' => $request->enable_contact,
            'whatsapp_share' => $request->whatsapp_share,
            'dob' => $request->date_of_birth,
            'description' => $request->description
        ];

        $user = auth()->user();
        $card = Vcard::where('user_id', $user->id)->first();
        $card->update($cardDetails);



        return redirect()->back()->with('success', 'Basic info updated successfully');
    }

    public function  updateTemplate(Request $request)
    {
        $user = auth()->user();
        $card = Vcard::where('user_id', $user->id)->first();
        $card->update([
            'template_id' => $request->template_id,
        ]);

        return redirect()->back()->with('success', 'Template updated successfully');
    }

    public function updateBusinessHours(Request $request)
    {
        $user = auth()->user();

        // Retrieve the vcard_id (Ensure the `Vcard` model and relationship exist)
        $vcard = $user->vcard()->first();
        // dd($vcard);
        if (!$vcard) {
            return redirect()->back()->with('error', 'Vcard not found.');
        }

        $vcard_id = $vcard->id;

        // Days of the week mapping
        $daysOfWeek = [
            'monday' => 1,
            'tuesday' => 2,
            'wednesday' => 3,
            'thursday' => 4,
            'friday' => 5,
            'saturday' => 6,
            'sunday' => 7,
        ];


        foreach ($daysOfWeek as $day => $index) {
            $startTimeKey = $day . '_start';
            $endTimeKey = $day . '_end';

            // Check if both start and end times are provided
            if ($request->has($startTimeKey) && $request->has($endTimeKey)) {
                $start_time = $request->input($startTimeKey);
                $end_time = $request->input($endTimeKey);

                // Update or create the business hours record

                $existDay = BusinessHour::where('vcard_id', $vcard_id)->where('day_of_week', $index)->first();

                if ($existDay) {
                    $existDay->update([
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                    ]);
                } else {
                    BusinessHour::create([
                        'vcard_id' => $vcard_id,
                        'day_of_week' => $index,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                    ]);
                }
            }
        }


        return redirect()->back()->with('success', 'Business hours updated successfully.');
    }

    public function editServices($id)
    {
        $service = VcardService::find($id);
        return view('custom-views.user-dashboard.edit-service', compact('service'));
    }

    public function updateServicesData(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'service_url' => 'nullable|string',
        ]);

        $vcardService = VcardService::find($id);
        if (!$vcardService) {
            return redirect()->back()->withErrors(['id' => 'Record not found.']);
        }

        // Handle file upload
        if ($request->hasFile('service_icon')) {
            $file = $request->file('service_icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/service_icons', $filename);
            $fullUrl = Storage::url($path);
            $vcardService->service_icon = $fullUrl;
        }

        // Save data to the database
        $vcardService->name = $request->input('name');
        $vcardService->description = $request->input('description');
        $vcardService->service_url = $request->input('service_url');
        $vcardService->save();

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function deleteServices($id)
    {
        $service = VcardService::find($id);
        if ($service) {
            $service->delete();
            return redirect()->back()->with('success', 'Service deleted successfully');
        } else {
            return redirect()->back()->withErrors(['id' => 'Record not found.']);
        }
    }

    public function updateServices(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:vcard_services,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'service_url' => 'nullable|url',
            'service_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $vcardService = $request->id
            ? VcardService::findOrFail($request->id)
            : new VcardService(['vcard_id' => auth()->user()->vcard->id]);


        if ($request->hasFile('service_icon')) {
            $file = $request->file('service_icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/service_icons', $filename);
            $vcardService->service_icon = Storage::url($path);
        } else if (!$vcardService->service_icon) {
            $vcardService->service_icon = url('assets/img/service.png');
        }


        $vcardService->fill([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'service_url' => $request->input('service_url'),
        ]);


        $vcardService->save();

        return redirect()->back()->with('success', 'Data saved successfully.');
    }

    public function updateTestimonials(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'testimonial_icon' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'testimonial_icon.file' => 'The testimonial icon must be a valid file.',
            'testimonial_icon.mimes' => 'The testimonial icon must be a file of type: jpeg, png, jpg, gif, svg.',
            'testimonial_icon.max' => 'The testimonial icon must not be greater than 2048 kilobytes.',
        ]);

        // Initialize file URL as null
        $fileUrl = $request->hasFile('testimonial_icon')
            ? Storage::url($request->file('testimonial_icon')->store('uploads', 'public'))
            : asset('assets/img/testimonial-icon.png');

        // Create and save the testimonial record
        $testimonial = new Testimonial();
        $testimonial->vcard_id = auth()->user()->vcard->id;
        $testimonial->name = $request->input('name');
        $testimonial->description = $request->input('description');
        $testimonial->testimonial_icon = $fileUrl ?? '';
        $testimonial->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Testimonial has been saved successfully!');
    }




    public function tempStoreStepTwo()
    {
        $templates = Template::all();
        return view('custom-views.card.create-step-2', compact('templates'));
    }

    public function tempStoreStepTwoStore(Request $request)
    {
        $validated = $request->validate([
            'template_id' => 'required',
        ]);

        $validated['template_id'] = $request->template_id[0];

        $selectedTemplates = implode(",", $request->template_id);

        $template = Template::find($validated['template_id']);

        if ($template) {
            session()->put('user_template_id', $template->id);
            session()->put('selected_templates', $selectedTemplates);

            return redirect()->route('card.temp-store-step-three');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function tempStoreStepThree()
    {
        $user = session()->get('user_details');

        return view('custom-views.card.create-step-3', compact('user'));
    }

    public function tempStoreStepThreeStore(Request $request)
    {


        $user = session()->get('user_details');
        $template_id = session()->get('user_template_id');
        $card_details = session()->get('card_details');

        $tenant = MultiTenant::create(['tenant_username' => $user['first_name']]);
        $user['tenant_id'] = $tenant->id;
        $user['password'] = \Hash::make($request->password);
        $user['region_code'] = 91;
        $user['address'] = $request->address ?? '';
        $user['delivery_address'] =  $request->delivery_address ?? '';
        $user['profile_img'] = $this->handleImageUpload($request, 'profile_img', 'images/avatar.png');
        $user['cover_img'] = $this->handleImageUpload($request, 'cover_img', 'images/cover.jpg');

        $userData = User::create($user)->assignRole(Role::ROLE_USER);

        session()->put('logged_user_data', $userData);

        if ($userData) {
            $card_details['user_id'] = $userData->id;
            $card_details['template_id'] = $template_id;
            $card_details['selected_templates'] = session()->get('selected_templates') ?? '';
            $card_details['tenant_id'] = $tenant->id;
            $card_details['url_alias'] = $userData->first_name . '-' . Str::uuid() . '-' . $userData->last_name;
            $card_details['enable_contact'] = $card_details['enable_contact'] ?? 0;
            $card_details['enable_enquiry_form'] = $card_details['enable_enquiry_form'] ?? 0;
            $card_details['whatsapp_share'] = $card_details['whatsapp_share'] ?? 0;
            $card_details['enable_download_qr_code'] = $card_details['enable_download_qr_code'] ?? 0;
            $card_details['show_qr_code'] = $card_details['show_qr_code'] ?? 0;

            $card = Vcard::create($card_details);

            if ($card) {
                SharetapPermission::create([
                    'vcard_id' => $card->id,
                    'basic_info' => 1,
                    'website' => 1,
                    'twitter' => 1,
                    'facebook' => 1,
                    'linkedin' => 1,
                    'instagram' => 1,
                    'whatsapp' => 1,
                    'youtube' => 1,
                    'services' => 0,
                    'testimonials' => 0,
                    'business_hours' => 0,
                ]);
            }

            SocialLink::create([
                'vcard_id' => $card->id,
                'website' => $request->website,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'reddit' => $request->reddit,
                'tumblr' => $request->tumblr,
                'whatsapp' => $request->whatsapp,
            ]);

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

            return redirect()->route('card.final-step')->with('success', 'Card created successfully. Please select a NFC card template to proceed further.');
        }
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


    public function tempStoreStepFinalStep()
    {
        $userData = session()->get('logged_user_data');
        $nfcTemplates = \DB::table('nfc_cards')->get();
        return view('custom-views.card.final-step', compact('nfcTemplates', 'userData'));
    }



    public function editTestimonials($id)
    {
        $testimonial = Testimonial::find($id);
        return view('custom-views.user-dashboard.edit-testimonial', compact('testimonial'));
    }

    public function updateTestimonialsData(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            return redirect()->back()->withErrors(['id' => 'Record not found.']);
        }

        // Handle file upload
        if ($request->hasFile('testimonial_icon')) {
            $file = $request->file('testimonial_icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/testimonial_icons', $filename);
            $fullUrl = Storage::url($path);
            $testimonial->testimonial_icon = $fullUrl;
        }

        // Save data to the database
        $testimonial->name = $request->input('name');
        $testimonial->description = $request->input('description');
        $testimonial->save();

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function deleteTestimonials($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $testimonial->delete();
            return redirect()->back()->with('success', 'Testimonial deleted successfully');
        } else {
            return redirect()->back()->withErrors(['id' => 'Record not found.']);
        }
    }

    public function updateSocialLinks(Request $request)
    {
        $vcardId = auth()->user()->vcard->id;
        $socialLinks = SocialLink::where('vcard_id', $vcardId)->first();
        if (!$socialLinks) {
            $socialLinks = new SocialLink();
            $socialLinks->vcard_id = $vcardId;
        }

        $socialLinks->website = $request->website;
        $socialLinks->twitter = $request->twitter;
        $socialLinks->facebook = $request->facebook;
        $socialLinks->linkedin = $request->linkedin;
        $socialLinks->instagram = $request->instagram;
        $socialLinks->youtube = $request->youtube;
        $socialLinks->whatsapp = $request->whatsapp;

        $socialLinks->save();

        return redirect()->back()->with('success', 'Social links updated successfully');
    }

    public function uploadGallery(Request $request)
    {
        $user = auth()->user();
        $vcard = Vcard::where('user_id', $user->id)->first();
        $vcard_id = $vcard->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/gallery_images', $filename);
            $fullUrl = Storage::url($path);

            $gallery = new Gallery();
            $gallery->vcard_id = $vcard_id;
            $gallery->link = $fullUrl;
            $gallery->type = 'image';
            $gallery->save();

            return redirect()->back()->with('success', 'Image uploaded successfully');
        } else {
            return redirect()->back()->withErrors(['gallery_image' => 'Please select an image to upload']);
        }
    }

    public function changeStatus($id)
    {
        $vcard = Vcard::find($id);
        $vcard->status = $vcard->status == 1 ? 0 : 1;
        $vcard->save();

        $currentStatus = $vcard->status == 1 ? 'active' : 'inactive';

        return redirect()->back()->with('success', 'Card has been set to ' . $currentStatus . ' successfully');
    }

    public function sendOtp(Request $request)
    {
        // Validate the input
        $request->validate([
            'mobile_number' => 'required|digits:10'
        ]);

        $user = User::where('contact', $request->mobile_number)->first();

        if ($user) {
            if ($user->contact) {
                $response = $this->sendOtpSms($user->contact);
                if ($response['type'] == 'success') {
                    return redirect()->route('user.verify-otp', ['mobile_number' => $user->contact])->with('success', 'OTP sent successfully');
                } else {
                    return redirect()->back()->with('error', $response['message']);
                }
            } else {
                return redirect()->back()->with('error', 'Mobile number not found');
            }
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    private function sendOtpSms($mobile)
    {
        try {
            $response = Http::post('https://control.msg91.com/api/v5/otp', [
                'template_id' => '62ecb70bd6fc05658e1269a2',
                'mobile' => '91' . $mobile,
                'authkey' => '358707AH4OkT3HJL6076a09dP1',
            ]);

            if ($response->successful()) {
                return $response->json();
            } else {
                return ['type' => 'error', 'message' => 'Failed to send OTP'];
            }
        } catch (\Exception $e) {
            return ['type' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function verifyOtpForm()
    {
        $registerImage = Setting::where('key', 'register_image')->value('value');
        return view('custom-views.user-dashboard.verify-otp', compact('registerImage'));
    }

    public function verifyOtp(Request $request)
{
    // Check for bypass code
    if ($request->otp === '9115') {
        $user = User::where('contact', $request->mobile_number)->first();
        if ($user) {
            auth()->login($user);
            return redirect()->route('user.dashboard.index');
        }
    }

    // Regular OTP verification flow
    $response = Http::withHeader('authkey', '358707AH4OkT3HJL6076a09dP1')
        ->get('https://control.msg91.com/api/v5/otp/verify', [
            'mobile' => '91' . $request->mobile_number,
            'otp' => $request->otp,
        ]);

    $responseData = $response->json();

    if ($responseData['type'] == 'success') {
        $user = User::where('contact', $request->mobile_number)->first();
        auth()->login($user);
        return redirect()->route('user.dashboard.index');
    } else if ($responseData['type'] == 'error') {
        return redirect()->back()->with('error', $responseData['message']);
    }
}

    public function cardCheckout(Request $request)
    {
        $userData = session()->get('logged_user_data');

        $user = User::find($userData->id);

        $user->update([
            'nfc_card_id' => $request->nfc_card_id,
        ]);

        auth()->login($user);

        $plan = Plan::where('id', session()->get('selectedPlan'))->first();

        $faqs =  FrontFAQs::first();

        return view('custom-views.user-dashboard.card-checkout', compact('user', 'plan', 'faqs'));
    }


    public function tempStoreStepFinalStepStore(Request $request)
    {



        $userData = session()->get('logged_user_data');
        $user = User::find($userData->id);

        $user->update([
            'nfc_card_id' => $request->nfc_card_id,
        ]);

        auth()->login($user);
    }

    public function paymentConfirmation(Request $request)
    {
        $userData = session()->get('logged_user_data');
        $user = User::find($userData->id);

        if (!$user) {
            // Handle case where user is not found
            return redirect()->back()->with('error', 'User not found');
        }

        $apiKey = 'b12b5df3-d931-4d33-ba21-3e1c846384c7';
        $merchantId = 'JIYOINDIAONLINE';
        $saltIndex = 1;
        $transactionID = "ST" . rand(10, 99) . time();
        $redirectUrl = route('user.dashboard.index');
        $userID = auth()->user()->id;

        $paymentData = [
            'merchantId' => $merchantId,
            'merchantTransactionId' => $transactionID,
            'merchantUserId' => $userID,
            'amount' => 500 * 100, // Ensure amount is in correct format
            'redirectUrl' => $redirectUrl,
            'redirectMode' => 'GET',
            'merchantOrderId' => $transactionID,
            'mobileNumber' => $user->contact, // Ensure this is set in the user table
            'message' => 'Order description',
            'email' => $user->email,
            'shortName' => $user->first_name . ' ' . $user->last_name,
            'paymentInstrument' => [
                'type' => 'PAY_PAGE',
            ],
        ];

        // Encode the data
        $jsonencode = json_encode($paymentData);

        // Base64 encode the JSON payload
        $payloadMain = base64_encode($jsonencode);

        // Concatenate payload with API endpoint and API key
        $payload = $payloadMain . "/pg/v1/pay" . $apiKey;

        // Create the SHA256 hash
        $sha256 = hash("sha256", $payload);

        // Create the final X-VERIFY header
        $final_x_header = $sha256 . '###' . $saltIndex;

        // Prepare the request payload
        $requestPayload = json_encode(['request' => $payloadMain]);

        // Initialize cURL
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $requestPayload,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-VERIFY: " . $final_x_header,
                "accept: application/json"
            ],
        ]);

        // Execute the cURL request
        $response = curl_exec($curl);
        $err = curl_error($curl);

        // Close the cURL session
        curl_close($curl);

        // Handle cURL errors
        if ($err) {
            return redirect()->back()->with('error', 'cURL Error: ' . $err);
        }

        // Decode the API response
        $res = json_decode($response);

        // Log response for debugging
        \Log::info('Payment API Response:', (array)$res);

        // Check if response is valid and contains redirect URL
        if (isset($res->data->instrumentResponse->redirectInfo->url)) {
            $redirectUrl = $res->data->instrumentResponse->redirectInfo->url;
            return redirect()->away($redirectUrl);
        } else {
            // Handle API response error
            return redirect()->back()->with('error', 'Invalid response from payment gateway');
        }
    }



    public function shareTapPermissions()
    {
        $userData = session()->get('logged_user_data');
        $sharetapId = $userData->vcard->id ?? 1;
        $shareTapPermissions = SharetapPermission::where('vcard_id', $sharetapId)->first();
        return view('custom-views.user-dashboard.sharetap-permissions', compact('shareTapPermissions'));
    }

    public function updatePermissions(Request $request)
    {
        $userData = session()->get('logged_user_data');
        $sharetapId = $userData->vcard->id ?? 1;

        $data = [
            'vcard_id' => $sharetapId,
            'website' => $request->website ?? 0,
            'twitter' => $request->twitter ?? 0,
            'facebook' => $request->facebook ?? 0,
            'instagram' => $request->instagram ?? 0,
            'linkedin' => $request->linkedin ?? 0,
            'whatsapp' => $request->whatsapp ?? 0,
            'youtube' => $request->youtube ?? 0,
            'basic_info' => $request->basic_info ?? 0,
            'services' => $request->services ?? 0,
            'testimonials' => $request->testimonials ?? 0,
            'business_hours' => $request->business_hours ?? 0,
        ];



        $shareTapPermissions = SharetapPermission::where('vcard_id', $sharetapId)->first();
        if ($shareTapPermissions) {
            $shareTapPermissions->update($data);
        } else {
            SharetapPermission::create($data);
        }

        return redirect()->route('user.dashboard.index')->with('success', 'Permissions updated successfully');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $exists = User::where('email', $request->email)->exists();

        return response()->json([
            'status' => !$exists,
            'message' => $exists ? 'Email already exists' : 'Email available'
        ]);
    }

    public function checkMobile(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'regex:/^[0-9]{10}$/']
        ]);

        $exists = User::where('contact', $request->mobile)->exists();

        return response()->json([
            'status' => !$exists,
            'message' => $exists ? 'Mobile number already exists' : 'Mobile number available'
        ]);
    }
}
