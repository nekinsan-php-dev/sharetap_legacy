@extends('front.layouts.app1')
@section('title')
    {{ getAppName() }} - Checkout
@endsection
@section('content')
    <div class="container">
        <x-main-logo class="mb-4" />
        <h2 class="mb-4 text-center text-primary fw-bold">Complete Your Order</h2>
        <form action="{{ route('user.payment.confirmation') }}" method="post">
            @csrf
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
                        <div class="card-header bg-gradient text-white" style="background-color: #4a90e2;">
                            <h4 class="mb-0"><i class="fas fa-user-circle me-2"></i>Customer Information</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-4 text-muted">
                                    <i class="fas fa-user me-2 text-primary"></i>Name:
                                </div>
                                <div class="col-sm-8 fw-bold">
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-4 text-muted">
                                    <i class="fas fa-phone me-2 text-primary"></i>Mobile:
                                </div>
                                <div class="col-sm-8 fw-bold">
                                    {{ auth()->user()->contact }}
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-4 text-muted">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i>Delivery Address:
                                </div>
                                <div class="col-sm-8 fw-bold">
                                    {{ auth()->user()->delivery_address ?? auth()->user()->address }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
                        <div class="card-header bg-gradient text-white" style="background-color: #2ecc71;">
                            <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Order Summary</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $productPrice = $plan->price ?? 0;
                                $gstRate = 0.18;
                                $shipping = 59;
                                $gstAmount = $productPrice * $gstRate;
                                $totalAmount = $productPrice + $gstAmount + $shipping;
                            @endphp
                            <div class="d-flex justify-content-between mb-3 pb-2 border-bottom">
                                <span class="text-muted">Plan Type</span>
                                <strong class="text-primary">{{ $plan->name ?? 'N/A' }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Product Price</span>
                                <strong>₹{{ number_format($productPrice, 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">GST (18%)</span>
                                <strong>₹{{ number_format($gstAmount, 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Shipping & Handling</span>
                                <strong>₹{{ number_format($shipping, 2) }}</strong>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="fw-bold fs-5">Total Amount</span>
                                <strong class="fs-5 text-primary">₹{{ number_format($totalAmount, 2) }}</strong>
                            </div>
                        </div>
                        <div class="card-footer bg-light border-top-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted fw-bold">Payable Amount</span>
                                <strong class="text-success fs-4">₹{{ number_format($totalAmount, 2) }}</strong>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-4 rounded-pill shadow-sm">
                        <i class="fas fa-lock me-2"></i>Proceed to Secure Payment
                    </button>
                    <p class="text-center mt-3 text-muted"><i class="fas fa-shield-alt me-2"></i>Your payment is secured and encrypted</p>
                </div>
            </div>
        </form>
    </div>
@endsection
