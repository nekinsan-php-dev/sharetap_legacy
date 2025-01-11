<?php

namespace App\Http\Controllers\New;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
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

        $plan = Plan::where('id', session()->get('selectedPlan'))->first();

        $planPrice = $plan->price;

        // Add 18% GST
        $gstPercentage = 18;
        $gstAmount = ($planPrice * $gstPercentage) / 100;

        // Add shipping & handling fee
        $shippingHandlingFee = 59.00;

        // Calculate final amount
        $finalAmount = $planPrice + $gstAmount + $shippingHandlingFee;


        $paymentData = [
            'merchantId' => $merchantId,
            'merchantTransactionId' => $transactionID,
            'merchantUserId' => $userID,
            'amount' => $finalAmount * 100, // Ensure amount is in correct format
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
}
