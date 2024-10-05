@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
<div>
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body p-0">
                <div class="row p-2">
                     <div class="col-md-12 p-2">
                       <form action="{{ route('user.social-links.update') }}" method="post">
                           @csrf
                           <div class="row social-links-add">
                               <div class="col-lg-6 mb-7">
                                   <div class="row">
                                       <div class="col-sm-1 mb-3 mb-sm-0">
                                           <svg class="svg-inline--fa fa-globe fa-2x text-primary mt-3 me-3"
                                                aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                               <path fill="currentColor"
                                                     d="M352 256C352 278.2 350.8 299.6 348.7 320H163.3C161.2 299.6 159.1 278.2 159.1 256C159.1 233.8 161.2 212.4 163.3 192H348.7C350.8 212.4 352 233.8 352 256zM503.9 192C509.2 212.5 512 233.9 512 256C512 278.1 509.2 299.5 503.9 320H380.8C382.9 299.4 384 277.1 384 256C384 234 382.9 212.6 380.8 192H503.9zM493.4 160H376.7C366.7 96.14 346.9 42.62 321.4 8.442C399.8 29.09 463.4 85.94 493.4 160zM344.3 160H167.7C173.8 123.6 183.2 91.38 194.7 65.35C205.2 41.74 216.9 24.61 228.2 13.81C239.4 3.178 248.7 0 256 0C263.3 0 272.6 3.178 283.8 13.81C295.1 24.61 306.8 41.74 317.3 65.35C328.8 91.38 338.2 123.6 344.3 160H344.3zM18.61 160C48.59 85.94 112.2 29.09 190.6 8.442C165.1 42.62 145.3 96.14 135.3 160H18.61zM131.2 192C129.1 212.6 127.1 234 127.1 256C127.1 277.1 129.1 299.4 131.2 320H8.065C2.8 299.5 0 278.1 0 256C0 233.9 2.8 212.5 8.065 192H131.2zM194.7 446.6C183.2 420.6 173.8 388.4 167.7 352H344.3C338.2 388.4 328.8 420.6 317.3 446.6C306.8 470.3 295.1 487.4 283.8 498.2C272.6 508.8 263.3 512 255.1 512C248.7 512 239.4 508.8 228.2 498.2C216.9 487.4 205.2 470.3 194.7 446.6H194.7zM190.6 503.6C112.2 482.9 48.59 426.1 18.61 352H135.3C145.3 415.9 165.1 469.4 190.6 503.6V503.6zM321.4 503.6C346.9 469.4 366.7 415.9 376.7 352H493.4C463.4 426.1 399.8 482.9 321.4 503.6V503.6z"></path>
                                           </svg>
                                           <!-- <i class="fas fa-globe fa-2x text-primary mt-3 me-3"></i> Font Awesome fontawesome.com -->
                                       </div>
                                       <div class="col-sm-11">
                                           <input class="form-control" placeholder="WebSite URL" name="website"
                                                  type="text" value="{{ $socialLinks->website }}">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-6 mb-7">
                                   <div class="row">
                                       <div class="col-sm-1 mb-sm-0 p-2 px-3">
                                           <svg xmlns="http://www.w3.org/2000/svg" fill="#000"
                                                viewBox="0 0 448 512" width="30" height="30">
                                               <path
                                                   d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"></path>
                                           </svg>
                                       </div>
                                       <div class="col-sm-11">
                                           <input class="form-control" placeholder="Twitter URL" name="twitter"
                                                  type="text" value="{{ $socialLinks->twitter }}">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-6 mb-7">
                                   <div class="row">
                                       <div class="col-sm-1 mb-3 mb-sm-0">
                                           <svg
                                               class="svg-inline--fa fa-facebook-square fa-2x text-primary mt-3 me-3"
                                               aria-hidden="true" focusable="false" data-prefix="fab"
                                               data-icon="facebook-square" role="img"
                                               xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                               data-fa-i2svg="">
                                               <path fill="currentColor"
                                                     d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.3V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0 -48-48z"></path>
                                           </svg>
                                           <!-- <i class="fab fa-facebook-square fa-2x text-primary mt-3 me-3"></i> Font Awesome fontawesome.com -->
                                       </div>
                                       <div class="col-sm-11">
                                           <input class="form-control" placeholder="Facebook URL"
                                                  name="facebook" type="text" value="{{ $socialLinks->facebook }}">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-6 mb-7">
                                   <div class="row">
                                       <div class="col-sm-1 mb-3 mb-sm-0">
                                           <svg class="svg-inline--fa fa-instagram fa-2x text-danger mt-3 me-3"
                                                aria-hidden="true" focusable="false" data-prefix="fab"
                                                data-icon="instagram" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg="">
                                               <path fill="currentColor"
                                                     d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                           </svg>
                                           <!-- <i class="fab fa-instagram fa-2x text-danger mt-3 me-3"></i> Font Awesome fontawesome.com -->
                                       </div>
                                       <div class="col-sm-11">
                                           <input class="form-control" placeholder="Instagram URL"
                                                  name="instagram" type="text" value="{{ $socialLinks->instagram }}">
                                       </div>
                                   </div>
                               </div>


                               <div class="col-lg-6 mb-7">
                                   <div class="row">
                                       <div class="col-sm-1 mb-3 mb-sm-0">
                                           <svg class="svg-inline--fa fa-youtube fa-2x text-danger mt-3 me-3"
                                                aria-hidden="true" focusable="false" data-prefix="fab"
                                                data-icon="youtube" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                data-fa-i2svg="">
                                               <path fill="currentColor"
                                                     d="M549.7 124.1c-6.281-23.65-24.79-42.28-48.28-48.6C458.8 64 288 64 288 64S117.2 64 74.63 75.49c-23.5 6.322-42 24.95-48.28 48.6-11.41 42.87-11.41 132.3-11.41 132.3s0 89.44 11.41 132.3c6.281 23.65 24.79 41.5 48.28 47.82C117.2 448 288 448 288 448s170.8 0 213.4-11.49c23.5-6.321 42-24.17 48.28-47.82 11.41-42.87 11.41-132.3 11.41-132.3s0-89.44-11.41-132.3zm-317.5 213.5V175.2l142.7 81.21-142.7 81.2z"></path>
                                           </svg>
                                           <!-- <i class="fab fa-youtube fa-2x text-danger mt-3 me-3"></i> Font Awesome fontawesome.com -->
                                       </div>
                                       <div class="col-sm-11">
                                           <input class="form-control" placeholder="Youtube URL" name="youtube"
                                                  type="text" value="{{ $socialLinks->youtube }}">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-6 mb-7">
                                   <div class="row">
                                       <div class="col-sm-1 mb-3 mb-sm-0">
                                           <svg class="svg-inline--fa fa-linkedin fa-2x text-primary mt-3 me-3"
                                                aria-hidden="true" focusable="false" data-prefix="fab"
                                                data-icon="linkedin" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg="">
                                               <path fill="currentColor"
                                                     d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                           </svg>
                                           <!-- <i class="fab fa-linkedin fa-2x text-primary mt-3 me-3"></i> Font Awesome fontawesome.com -->
                                       </div>
                                       <div class="col-sm-11">
                                           <input class="form-control" placeholder="LinkedIn URL"
                                                  name="linkedin" type="text" value="{{ $socialLinks->linkedin }}">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-6 mb-7">
                                   <div class="row">
                                       <div class="col-sm-1 mb-3 mb-sm-0">
                                           <svg class="svg-inline--fa fa-whatsapp fa-2x text-success mt-3 me-3"
                                                aria-hidden="true" focusable="false" data-prefix="fab"
                                                data-icon="whatsapp" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                data-fa-i2svg="">
                                               <path fill="currentColor"
                                                     d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                                           </svg>
                                           <!-- <i class="fab fa-whatsapp fa-2x text-success mt-3 me-3"></i> Font Awesome fontawesome.com -->
                                       </div>
                                       <div class="col-sm-11">
                                           <input class="form-control" placeholder="Whatsapp URL"
                                                  name="whatsapp" type="text" value="{{ $socialLinks->whatsapp }}">
                                       </div>
                                   </div>
                               </div>


                           </div>
                           <div>
                                 <button type="submit" class="btn btn-primary">Update</button>
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div> </div>
    </div>
@endsection
