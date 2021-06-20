<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
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

});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
