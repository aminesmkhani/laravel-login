<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
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

//Route::get('/',function (){
//
//  $url = URL::temporarySignedRoute('test', now()->addMinutes(60),['id'=> 85, 'email' => 'amin@gmail.com']);
//   dd($url);
//});
//
//Route::get('/verify',function (Request $request){
//    Url::hasValidSignature($request);
//})->name('test');



Route::group(['prefix' =>'auth', 'namespace' => 'Auth'],function (){
   Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register.form');
   Route::post('register', [RegisterController::class, 'register'])->name('auth.register');

   # Login Route
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.login.form');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login');

   # Logout

    Route::get('logout',[LoginController::class, 'logout'])->name('auth.logout');

});

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
