<?php

use App\Http\Controllers\CustomController\CardController;
use App\Http\Controllers\CustomController\UserDashboardController;



Route::post('/check-email', [CardController::class, 'checkEmail'])->name('card.check-email');
Route::post('/check-mobile', [CardController::class, 'checkMobile'])->name('card.check-mobile');

// Guest routes
Route::group(['prefix' => 'user'], function () {
    Route::get('login', [UserDashboardController::class, 'login'])->name('user.login');
    Route::post('login', [UserDashboardController::class, 'loginPost'])->name('user.login.post');
    Route::post('send-otp', [CardController::class, 'sendOtp'])->name('user.send-otp');
    Route::get('verify-otp', [CardController::class, 'verifyOtpForm'])->name('user.verify-otp');
    Route::post('verify-otp', [CardController::class, 'verifyOtp'])->name('user.verify-otp');
});

// Card creation routes
Route::group(['prefix' => 'card/create'], function () {
    Route::get('/', [CardController::class, 'create'])->name('card.create');
    Route::post('step-1/store', [CardController::class, 'tempStore'])->name('card.tempStore');
    Route::get('step-2', [CardController::class, 'tempStoreStepTwo'])->name('card.temp-store-step-two');
    Route::post('step-2', [CardController::class, 'tempStoreStepTwoStore'])->name('card.temp-store-step-two-store');
    Route::get('step-3', [CardController::class, 'tempStoreStepThree'])->name('card.temp-store-step-three');
    Route::post('step-3', [CardController::class, 'tempStoreStepThreeStore'])->name('card.temp-store-step-three-store');
    Route::get('final-step', [CardController::class, 'tempStoreStepFinalStep'])->name('card.final-step');
    Route::post('final-step', [CardController::class, 'tempStoreStepFinalStepStore'])->name('card.final-step');


});

Route::get('card/checkout', [CardController::class, 'cardCheckout'])->name('card.checkout');
Route::post('payment/confirmation', [CardController::class, 'paymentConfirmation'])->name('user.payment.confirmation');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard.index');
        Route::get('basic-info', [UserDashboardController::class, 'basicInfo'])->name('user.basic.info');
        Route::get('profile/edit', [UserDashboardController::class, 'editProfile'])->name('user.profile.edit');
        Route::put('profile/edit', [UserDashboardController::class, 'updateProfile']);
        Route::get('profile/templates', [UserDashboardController::class, 'templates'])->name('user.profile.templates');
        Route::get('business-hours', [UserDashboardController::class, 'businessHours'])->name('user.business-hours');
        Route::get('services', [UserDashboardController::class, 'servicesView'])->name('user.services');
        Route::get('testimonials', [UserDashboardController::class, 'testimonialsView'])->name('user.testimonials');
        Route::get('social-links', [UserDashboardController::class, 'socialLinks'])->name('user.social-links');
        Route::get('gallery', [UserDashboardController::class, 'gallery'])->name('user.gallery');
        Route::post('logout', [UserDashboardController::class, 'logout'])->name('user.logout');
    });

    Route::prefix('user')->group(function () {
        Route::put('basic-info/update', [CardController::class, 'updateBasicInfo'])->name('user.basic-info.update');
        Route::put('template/update', [CardController::class, 'updateTemplate'])->name('user.template.update');
        Route::post('business-hours/update', [CardController::class, 'updateBusinessHours'])->name('user.business-hours.update');
        Route::post('social-links/update', [CardController::class, 'updateSocialLinks'])->name('user.social-links.update');
        Route::post('gallery/upload', [CardController::class, 'uploadGallery'])->name('user.gallery.upload');
        Route::get('profile/change-status/{id}', [CardController::class, 'changeStatus'])->name('user.vcard.change-status');
    });

    Route::prefix('user/services')->group(function () {
        Route::get('edit/{id}', [CardController::class, 'editServices'])->name('user.services.edit');
        Route::post('update', [CardController::class, 'updateServices'])->name('user.services.update');
        Route::put('update/{id}', [CardController::class, 'updateServicesData'])->name('user.services.update.data');
        Route::delete('delete/{id}', [CardController::class, 'deleteServices'])->name('user.services.delete');
    });

    Route::prefix('user/testimonials')->group(function () {
        Route::post('update', [CardController::class, 'updateTestimonials'])->name('user.testimonials.update');
        Route::get('edit/{id}', [CardController::class, 'editTestimonials'])->name('user.testimonials.edit');
        Route::put('update/{id}', [CardController::class, 'updateTestimonialsData'])->name('user.testimonials.update.data');
        Route::delete('delete/{id}', [CardController::class, 'deleteTestimonials'])->name('user.testimonials.delete');
    });

    Route::prefix('sharetap')->group(function () {
        Route::get('permissions', [CardController::class, 'shareTapPermissions'])->name('user.sharetap.permissions');
        Route::post('permissions/update', [CardController::class, 'updatePermissions'])->name('user.sharetap.permissions.update');
    });
});
