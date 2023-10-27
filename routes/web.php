<?php

use App\Http\Controllers\FrontendController;
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

Route::get('/',[FrontendController::class , 'index'])->name('index');
Route::get('/beauty-gallery',[FrontendController::class , 'gallery'])->name('gallery');
Route::get('/experts-advice',[FrontendController::class , 'blogListing'])->name('blogListing');
Route::get('/blogs/{slug}',[FrontendController::class , 'blogDetail'])->name('blogDetail');
Route::get('/treatments/{slug}',[FrontendController::class , 'treatments'])->name('treatments');
Route::get('/treatments/services/{slug}',[FrontendController::class , 'treatmentService'])->name('treatmentService');
Route::get('/gp-consultation',[FrontendController::class , 'gp'])->name('gp');
Route::get('/terms-and-conditions',[FrontendController::class , 'terms'])->name('terms');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
