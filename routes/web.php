<?php

// use App\Http\Controllers\Frontend\LoginController;
// use Frontend\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\Auth\VerificationController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\LoginController;

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



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[IndexController::class,'index'])->name('frontend.index');

// //Authentication Routes...
// Route::get('/login',                            ['as' => 'frontend.show_login_form', 'uses' => 'LoginController@showLoginForm']);
Route::get('/login',                            [LoginController::class,'showLoginForm'])->name('show_login_form');
Route::post('login',                            [LoginController::class ,'login'])->name('login');
Route::post('logout',                           [LoginController::class,'logout'])->name('logout');
Route::get('register',                          [RegisterController::class,'showRegistrationForm'])->name('show_register_form');
Route::post('register',                         [RegisterController::class ,'create'])->name('register');
Route::get('password/reset',                    [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email',                   [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}',            [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset',                   [ResetPasswordController::class,'reset'])->name('password.update');
Route::get('email/verify',                      [VerificationController::class,'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}',         [VerificationController::class,'verify'])->name('verification.verify');
Route::post('email/resend',                     [VerificationController::class,'resend'])->name('verification.resend');

