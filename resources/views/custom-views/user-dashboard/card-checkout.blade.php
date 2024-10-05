@extends('front.layouts.app1')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')
    <div style="height: 160px;"></div>
  <div class="container">
        <div>
            <h4>
                Checkout
            </h4>
        </div>
      <form action="{{ route('user.payment.confirmation') }}" method="post">
          @csrf
          <div class="row">
              <div class="col-md-8">
                  <div class="card shadow bg-white p-4" style="font-size: 16px;">
                      <div class="d-flex justify-content-between ">
                          <div class="text-dark">
                              Name:
                          </div>
                          <div class="text-dark">
                              {{ auth()->user()->first_name }}{{ auth()->user()->last_name }}
                          </div>
                      </div>
                      <div class="d-flex justify-content-between mt-4">
                          <div class="text-dark">
                              Mobile:
                          </div>
                          <div class="text-dark">
                              {{ auth()->user()->contact }}
                          </div>
                      </div>
                      <div class="d-flex justify-content-between mt-4">
                          <div class="text-dark">
                              Delivery Address:
                          </div>
                          <div class="text-dark">
                              {{ auth()->user()->delivery_address ?? auth()->user()->address }}
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card shadow bg-white text-dark p-0">
                      <div class="p-4">
                          <div class="d-flex justify-content-between">
                              <div>
                                  Plan Type
                              </div>
                              <div>
                                  {{ $plan->name ?? '' }}
                              </div>
                          </div>
                          <div class="d-flex justify-content-between mt-3">
                              <div>
                                  Product Price
                              </div>
                              <div>
                                  @php
                                      $selectedPlan = session()->get('selectedPlan');
                                      $productPrice =  $plan->price ?? 0;
                                  @endphp
                                  {{ $productPrice }}
                              </div>
                          </div>
                          <div class="d-flex justify-content-between mt-3">
                              <div>
                                  GST
                              </div>
                              <div>
                                  18%
                              </div>
                          </div>
                          <div class="d-flex justify-content-between mt-3">
                              <div>
                                  Shipping & Handling
                              </div>
                              <div>
                                  59
                              </div>
                          </div>
                          <div class="d-flex justify-content-between mt-3">
                              <div>
                                  Total Amount
                              </div>
                              <div>
                                  @php
                                      $gstRate = 0.18;
                                      $shipping = 59;
                                      $gstAmount = $productPrice * $gstRate;
                                      $totalAmount = $productPrice + $gstAmount + $shipping;
                                  @endphp
                                  {{ number_format($totalAmount, 2) }}
                              </div>
                          </div>
                      </div>
                      <div class="d-flex justify-content-between mt-3 bg-success p-4">
                          <div>
                              Payable Amount
                          </div>
                          <div>
                              {{ number_format($totalAmount, 2) }}
                          </div>
                      </div>
                  </div>
                  <div class="text-center mt-3">
                      <button type="submit" class="btn btn-warning w-100">Checkout</button>
                  </div>
              </div>
          </div>
      </form>
  </div>
@endsection
