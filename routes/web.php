<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;
use App\Models\ListingImage;
use App\Models\Listing;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Registered;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::put(
  'notification/{notification}/seen',
  NotificationSeenController::class
)->middleware('auth')->name('notification.seen');

Route::get('/' , [IndexController::class, 'index']);
Route::get('/hello' , [IndexController::class, 'show']);

Route::resource('listing.offer', ListingOfferController::class)->middleware('auth')->only(['store']);
Route::resource('listing', ListingController::class)->only(['index', 'show']);


Route::resource('notification', NotificationController::class)->middleware('auth')->only(['index']);

Route::get('/email/verify', function() {
  return inertia('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect()->route('listing.index')->with('success', 'Email was verified!');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->except('destroy');



Route::prefix('realtor')
  ->name('realtor.')
  ->middleware(['auth', 'verified'])
  ->group(function () {
    Route::name('listing.restore')->put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])->withTrashed();
    Route::resource('listing', RealtorListingController::class)->withTrashed();
  });

  Route::resource('listing.image', RealtorListingImageController::class)->only(['store', 'create', 'destroy']);

  Route::name('offer.accept')
  ->put(
    'offer/{offer}/accept',
    RealtorListingAcceptOfferController::class
  );

  Route::get('/phpinfo', function() {
    phpinfo();

    
});