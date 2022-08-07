<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\Auth\VerificationController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
// use App\Http\Controllers\Backend\IndexController;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\HomeController;

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

 Route::get('/',                                [IndexController::class, 'index'])->name('frontend.index');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Authentication Routes...
Route::get('/login',                            [LoginController::class ,'showLoginForm']);
Route::post('login',                            [LoginController::class ,'login']);
Route::post('logout',                           [LoginController::class,'logout']);
Route::get('register',                          [RegisterController::class,'showRegistrationForm']);
Route::post('register',                         [RegisterController::class ,'register']);
Route::get('password/reset',                    [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email',                   [ForgotPasswordController::class,'sendResetLinkEmail']);
Route::get('password/reset/{token}',            [ResetPasswordController::class,'showResetForm']);
Route::post('password/reset',                   [ResetPasswordController::class,'reset']);
Route::get('email/verify',                      [VerificationController::class,'show']);
Route::get('/email/verify/{id}/{hash}',         [VerificationController::class,'verify']);
Route::post('email/resend',                     [VerificationController::class,'resend']);

