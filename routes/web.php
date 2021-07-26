<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Auth\MagicController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

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

Route::get('/',[PanelController::class, 'index'])->name('home');
Route::get('/home',[PanelController::class, 'index']);


Route::group(['prefix' =>'auth', 'namespace' => 'Auth'],function (){
   Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register.form');
   Route::post('register', [RegisterController::class, 'register'])->name('auth.register');

   # Login Route
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.login.form');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login');

   # Logout
    Route::get('logout',[LoginController::class, 'logout'])->name('auth.logout');


    Route::get('email/send-verification',[VerificationController::class, 'send'])->name('auth.email.send.verification');
    Route::get('email/verify',[VerificationController::class, 'verify'])->name('auth.email.verify');


    # Forget Password
    Route::get('password/forget',[ForgotPasswordController::class,'showForgetForm'])->name('auth.password.forget.form');
    Route::post('password/forget',[ForgotPasswordController::class,'sendResetLink'])->name('auth.password.forget');
    Route::get('password/reset',[ResetPasswordController::class,'showResetForm'])->name('auth.password.reset.form');
    Route::post('password/reset',[ResetPasswordController::class,'reset'])->name('auth.password.reset');


    # Login Socials
    Route::get('redirect/{provider}',[SocialController::class,'redirectToProvider'])->name('auth.login.provider.redirect');
    Route::get('{provider}/callback',[SocialController::class,'providerCallback'])->name('auth.login.provider.callback');


    # Login Magic Link
    Route::get('magic/login',[MagicController::class,'showMagicForm'])->name('auth.magic.login.form');
    Route::post('magic/login',[MagicController::class,'sendToken'])->name('auth.magic.send.token');
    Route::get('magic/login/{token}', [MagicController::class,'login'])->name('auth.magic.login');


    # Two Factor Auth
    Route::get('two-factor/toggle',[TwoFactorController::class,'showToggleForm'])->name('auth.two.factor.toggle.form');
    Route::get('two-factor/activate',[TwoFactorController::class,'activate'])->name('auth.two.factor.activate');
    Route::get('two-factor/code',[TwoFactorController::class,'showEnterCodeForm'])->name('auth.two.factor.code.form');
    Route::post('two-factor/code',[TwoFactorController::class,'confirmCode'])->name('auth.two.factor.code');
    Route::get('two-factor/deactivate',[TwoFactorController::class,'deactivate'])->name('auth.two.factor.deactivate');



});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
