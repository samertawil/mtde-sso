<?php


use Illuminate\Support\Facades\Route;
use mtde\sso\Http\Middleware\CheckIdc;
use mtde\sso\Http\Controllers\PackAuth\AuthController;
use mtde\sso\Http\Controllers\PackAuth\PasswordController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['web','guest'], 'as' => 'sso.'], function () {

  Route::group(['prefix' => 'sso'], function () {


    Route::get('/login-form', [AuthController::class, 'showLoginForm'])->name('login.form');   
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register-create', [AuthController::class, 'register_create'])->name('register.create');
    Route::get('/registration-form', [AuthController::class, 'register_form'])->name('register.form');
    Route::post('/register', [AuthController::class, 'saveRegister'])->name('register');


    Route::get('/change-password-form', [PasswordController::class, 'changepassword_form'])->name('changePassword-form');
    Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('changePassword');


    Route::get('/forget-password-create', [PasswordController::class, 'forgetpassword_create'])->name('forgetPassword.create');
    Route::get('/forget-password-form', [PasswordController::class, 'forgetPassword_form'])->name('forgetPassword.form');
    Route::post('/forget-password/{idc}', [PasswordController::class, 'saveForgetPassword'])->name('saveForgetPassword');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('ssohome', function () {
      return view('pack::pack-layouts.home');
    })->name('ssoHome');



  });
});
