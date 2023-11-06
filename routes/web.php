<?php

use App\Http\Controllers\FrontendController;
use App\Http\Middleware\SetSessionId;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/beauty-gallery', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('/experts-advice', [FrontendController::class, 'blogListing'])->name('blogListing');
Route::get('/blogs/{slug}', [FrontendController::class, 'blogDetail'])->name('blogDetail');
Route::get('/treatments/{slug}', [FrontendController::class, 'treatments'])->name('treatments');
Route::get('/treatments/services/{slug}', [FrontendController::class, 'treatmentService'])->name('treatmentService');
Route::get('/gp-consultation', [FrontendController::class, 'gp'])->name('gp');
Route::post('/gp-consultation/submit', [FrontendController::class, 'gpConsultation_submit'])->name('gpConsultation_submit');
Route::get('/terms-and-conditions', [FrontendController::class, 'terms'])->name('terms');
Route::post('/check_avalibility', [FrontendController::class, 'check_avalibilty'])->name('check_avalibilty');
Route::get('/add-to-cart/{id}', [FrontendController::class, 'addToCart'])->name('addToCart');
Route::get("/cart", [FrontendController::class, 'cart_product'])->name('cart_product');
Route::get('/my-cart', [FrontendController::class, 'my_cart'])->name('cart.my-cart');
Route::get('/my-cart/{id}/remove', [FrontendController::class, 'remove_cart'])->name('remove_cart');
Route::get('/checkout/payment-proceed/{oid}', [FrontendController::class, 'checkout_success'])->name('checkout.payment.proceed');
Route::post("/in/clinic/submit", [FrontendController::class , 'in_clinic_submit'])->name('in_clinic_submit');
Route::post("/in/clinic/login/submit", [FrontendController::class , 'in_clinic_login_submit'])->name('in_clinic_login_submit');
Route::get('/check/{email}', [FrontendController::class, 'check_email'])->name('check_email');
Route::get('/checkout/success/{oid}', [FrontendController::class, 'checkout_success_payment_final'])->name('checkout.success.payment.final');


// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });

