@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div style="background:url('https://nekinsan.co/sharetap/public/assets/images/bg-shapes.png'); margin-top: -16px;padding-top: 2rem;height: -webkit-fill-available;">
    <div class="container">
        <div class="p-4 text-center" >
                    <h4 class="card-title mb-0 d-inline-block csnton-tit-other w-100">Choose Card Template</h4>
                    <span> <img src="https://nekinsan.co/sharetap/public/assets/images/border.png" class="w-25 vcard-img" alt="vcard-img"></span>
              </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
         <div style="position:relative;padding-botton:4rem;">
           <div style="width: 100%; display: flex;justify-content: space-between;">
            <span class="border5-new" style="position: absolute;left: 0;width: 12%;z-index: 1;"> <img src="https://nekinsan.co/sharetap/public/assets/images/border1.png" alt="vcard-bg" class="w-100 h-auto"></span>
         <span class="border6-new" style="position: absolute;right: 0;width: 12%;z-index: 1;"> <img src="https://nekinsan.co/sharetap/public/assets/images/border2.png" alt="vcard-bg" class="w-100 h-auto"></span>
        </div>
        <form action="{{ route('card.checkout') }}" method="post" enctype="multipart/form-data" style="padding: 29px;">
            @csrf
            <div class="card shadow mb-10 card-cyuston-sacht">
                <div class="card-body p-0">
                    <div class="p-4 mt-2">
                        <div class="form-group mb-7 vcard-template">
                            <div class="row">
                                @foreach($nfcTemplates as $template)
                                    <div class="col-md-6">
                                        <label for="template-{{ $template->id }}" style="cursor: pointer;">
                                            <div class="card shadow selectable-card" data-template-id="{{ $template->id }}">
                                                <div class="d-flex">
                                                    <div class="p-2">
                                                        <img src="{{ asset($template->front_path) }}" style="width: 100%;">
                                                    </div>
                                                    <div class="p-2">
                                                        <img src="{{ asset($template->back_path) }}" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between p-2">
                                                    <div>
                                                        <h5>{{ $template->name }}</h5>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="nfc_card_id" value="{{ $template->id }}" id="template-{{ $template->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-0 m-0 footer-card-ctrumm text-center">
                    <div class="p-2">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>
        </form>
        <div style="width: 100%; display: flex; justify-content: space-between;">
            <span class="border3-new" style="position: absolute;left: 0;width: 12%;z-index: 1;bottom: 37px;"> <img src="https://nekinsan.co/sharetap/public/assets/images/border3.png" alt="vcard-bg" class="w-100 h-auto"></span>
         <span class="border4-new" style="position: absolute;right: 0;width: 12%;z-index: 1;bottom: 37px;"> <img src="https://nekinsan.co/sharetap/public/assets/images/border4.png" alt="vcard-bg" class="w-100 h-auto"></span>
        </div>
      </div>
  </div>
    <script>
        $(document).ready(function(){
            $('.selectable-card').click(function(){
                var templateId = $(this).data('template-id');
                $('#template-' + templateId).prop('checked', true);
            });
        });
    </script>
@endsection
