@extends('front.layouts.app1')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')
    <style>
        .policy-container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .policy-title {
            text-align: center;
            color: #333;
        }
        .policy-divider {
            border: 0;
            height: 1px;
            background: #333;
            margin: 20px 0;
        }
        .policy-text {
            color: #555;
        }
        .policy-highlight {
            font-weight: bold;
            color: #000;
        }
        .policy-section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }
        .policy-email-link {
            color: #007BFF;
            text-decoration: none;
        }
        .policy-email-link:hover {
            text-decoration: underline;
        }
    </style>
    <div style="margin-top: 150px;">
        <div class="policy-container">
            <h1 class="policy-title">Refund And Returns Policy</h1>
            <hr class="policy-divider">
            <p class="policy-text">Thank you for purchasing SHARETAP.</p>
            <p class="policy-text">If, for any reason, you are not completely satisfied with a purchase, we invite you to review our policy on refunds and returns.</p>
            <p class="policy-text">The following terms are applicable for any products that you purchased with Us.</p>

            <div class="policy-section-title">Interpretations</div>
            <p class="policy-text">Any interruption happens during the online transaction and the money is reflected in our bank account and still the user is not able to do purchase, we will be proceeding its refund within 14 working days.</p>

            <div class="policy-section-title">Returning Goods</div>
            <p class="policy-text">If in case the sticker is damaged, then the user needs to share the damaged picture of the sticker on mentioned email id <a href="mailto:support@nekinsan.com" class="policy-email-link">support@nekinsan.com</a>, thereafter we will send a fresh sticker to the user.</p>
        </div>
    </div>
@endsection
