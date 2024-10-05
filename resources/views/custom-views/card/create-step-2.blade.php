@extends('layouts.auth')
@section('title')
    {{ __('messages.common.register') }}
@endsection
@section('content')
<div style="background:url('https://nekinsan.co/sharetap/public/assets/images/bg-shapes.png'); margin-top: -16px;padding-top: 2rem;">
    <div class="container">
        <div class="p-4 text-center" >
                    <h4 class="card-title mb-0 d-inline-block csnton-tit-other w-100">Choose Template </h4>
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
                   <form id="templateForm" action="{{ route('card.temp-store-step-two-store') }}" method="post" style="padding: 29px;">
                       @csrf
                       <div class="card shadow mb-10 card-cyuston-sacht">
                           <div class="card-body p-0">
                               <div class="p-4 mt-2">
                                   <div class="form-group mb-7 vcard-template">
                                       <div class="row">
                                           @foreach($templates as $template)
                                               <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-3 templatecard">
                                                   <label class="img-radio img-thumbnail" data-id="1">
                                                       <div class="d-flex justify-content-between">
                                                           <div class="text-dark" style="font-size: 14px; padding: 5px;">
                                                               <h5>{{ $template->name }}</h5>
                                                           </div>
                                                           <div>
                                                               <input type="checkbox" name="template_id[]" value="{{ $template->id }}" class="template-checkbox">
                                                           </div>
                                                       </div>
                                                       <img src="{{ asset($template->path) }}" alt="Template">
                                                   </label>
                                               </div>
                                           @endforeach
                                       </div>
                                       <div id="error-message" style="color: red; display: none;">Please select exactly 3 templates.</div>
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
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const checkboxes = document.querySelectorAll('.template-checkbox');
            const form = document.getElementById('templateForm');
            const errorMessage = document.getElementById('error-message');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const checkedCheckboxes = document.querySelectorAll('.template-checkbox:checked');
                    if (checkedCheckboxes.length > 3) {
                        checkbox.checked = false;
                        errorMessage.textContent = 'You can only select up to 3 templates.';
                        errorMessage.style.display = 'block';
                    } else {
                        errorMessage.style.display = 'none';
                    }
                });
            });

            form.addEventListener('submit', (event) => {
                const checkedCheckboxes = document.querySelectorAll('.template-checkbox:checked');
                if (checkedCheckboxes.length !== 3) {
                    event.preventDefault();
                    errorMessage.textContent = 'Please select exactly 3 templates.';
                    errorMessage.style.display = 'block';
                } else {
                    errorMessage.style.display = 'none';
                }
            });
        });


    </script>
@endsection
