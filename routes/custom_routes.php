<?php

use App\Http\Controllers\CustomController\CardController;
use App\Http\Controllers\CustomController\UserDashboardController;

Route::get('user/login',[UserDashboardController::class,'login'])->name('user.login');
Route::post('user/login',[UserDashboardController::class,'loginPost'])->name('user.login.post');
Route::get('card/create',[CardController::class,'create'])->name('card.create');
Route::post('card/create/step-1/store',[CardController::class,'tempStore'])->name('card.tempStore');
Route::get('card/create/step-2',[CardController::class,'tempStoreStepTwo'])->name('card.temp-store-step-two');
Route::post('card/create/step-2',[CardController::class,'tempStoreStepTwoStore'])->name('card.temp-store-step-two-store');
Route::get('card/create/step-3',[CardController::class,'tempStoreStepThree'])->name('card.temp-store-step-three');
Route::post('card/create/step-3',[CardController::class,'tempStoreStepThreeStore'])->name('card.temp-store-step-three-store');
Route::get('card/create/final-step',[CardController::class,'tempStoreStepFinalStep'])->name('card.final-step');
Route::post('card/create/final-step',[CardController::class,'tempStoreStepFinalStepStore'])->name('card.final-step');
Route::post('card/checkout',[CardController::class,'cardCheckout'])->name('card.checkout');
Route::post('payment/confirmation',[CardController::class,"paymentConfirmation"])->name('user.payment.confirmation');
Route::post('user.send-otp',[CardController::class,'sendOtp'])->name('user.send-otp');
Route::get('user/verify-otp',[CardController::class,'verifyOtpForm'])->name('user.verify-otp');
Route::post('user/verify-otp',[CardController::class,'verifyOtp'])->name('user.verify-otp');

Route::middleware(['auth'])->group(function () {
    Route::get('user/dashboard',[UserDashboardController::class,'dashboard'])->name('user.dashboard.index');
    Route::get('user/profile/edit',[UserDashboardController::class,'editProfile'])->name('user.profile.edit');
    Route::put('user/profile/edit',[UserDashboardController::class,'updateProfile'])->name('user.profile.edit');
    Route::get('user/profile/templates',[UserDashboardController::class,'templates'])->name('user.profile.templates');
    Route::get('user/business-hours',[UserDashboardController::class,'businessHours'])->name('user.business-hours');
    Route::get('user/services',[UserDashboardController::class,'servicesView'])->name('user.services');
    Route::get('user/testimonials',[UserDashboardController::class,'testimonialsView'])->name('user.testimonials');
    Route::get('user/social-links',[UserDashboardController::class,'socialLinks'])->name('user.social-links');
    Route::get('user/gallery',[UserDashboardController::class,'gallery'])->name('user.gallery');

    Route::put('user/basic-info/update',[CardController::class,'updateBasicInfo'])->name('user.basic-info.update');
    Route::put('user/template/update',[CardController::class,'updateTemplate'])->name('user.template.update');
    Route::post('user/business-hours/update',[CardController::class,'updateBusinessHours'])->name('user.business-hours.update');
    Route::get('user/services/edit/{id}',[CardController::class,'editServices'])->name('user.services.edit');
    Route::post('user/services/update',[CardController::class,'updateServices'])->name('user.services.update');
    Route::put('user/services/update/{id}',[CardController::class,'updateServicesData'])->name('user.services.update.data');
    Route::delete('user/services/delete/{id}',[CardController::class,'deleteServices'])->name('user.services.delete');
    Route::post('user/testimonials/update',[CardController::class,'updateTestimonials'])->name('user.testimonials.update');
    Route::get('user/testimonials/edit/{id}',[CardController::class,'editTestimonials'])->name('user.testimonials.edit');
    Route::put('user/testimonials/update/{id}',[CardController::class,'updateTestimonialsData'])->name('user.testimonials.update.data');
    Route::delete('user/testimonials/delete/{id}',[CardController::class,'deleteTestimonials'])->name('user.testimonials.delete');
    Route::post('user/social-links/update',[CardController::class,'updateSocialLinks'])->name('user.social-links.update');
    Route::post('user/gallery/upload',[CardController::class,'uploadGallery'])->name('user.gallery.upload');
    Route::get('user/profile/change-status/{id}',[CardController::class,'changeStatus'])->name('user.vcard.change-status');

    Route::get('sharetap/permissions',[CardController::class,"shareTapPermissions"])->name('user.sharetap.permissions');
    Route::post('sharetap/permissions/update',[CardController::class,"updatePermissions"])->name('user.sharetap.permissions.update');

    Route::post('user/logout',[UserDashboardController::class,'logout'])->name('user.logout');
});
