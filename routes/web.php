<?php

use Frontend\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Frontend\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Frontend\Auth\VerificationController;
use Frontend\Auth\ResetPasswordController;
use Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\IndexController;
// use App\Http\Controllers\Backend\IndexController;

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
 Route::get('/',                                [IndexController::class, 'index']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Authentication Routes...
Route::get('/login',                            [LoginController::class ,'showLoginForm'])->name('frontend.show_login_form');
Route::post('login',                            [LoginController::class ,'login'])->name('frontend.login');
Route::post('logout',                           [LoginController::class,'logout'])->name('frontend.logout');
Route::get('register',                          [RegisterController::class,'showRegistrationForm'])->name('frontend.show_register_form');
Route::post('register',                         [RegisterController::class ,'register'])->name('frontend.register');
Route::get('password/reset',                    [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email',                   [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}',            [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset',                   [ResetPasswordController::class,'reset'])->name('password.update');
Route::get('email/verify',                      [VerificationController::class,'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}',         [VerificationController::class,'verify'])->name('verification.verify')->name('verification.resend');
Route::post('email/resend',                     [VerificationController::class,'resend']);
