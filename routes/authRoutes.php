<?php

 
use Illuminate\Support\Facades\Route;
use mtde\sso\Http\Middleware\CheckIdc;
use mtde\sso\Http\Controllers\PackAuth\AuthController;
use mtde\sso\Http\Controllers\PackAuth\PasswordController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


 Route::group(['prefix' => LaravelLocalization::setLocale()], function()
  {

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest','web');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest','web');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/register-create', [AuthController::class, 'register_create'])->name('register.create')->middleware('guest','web');
Route::get('/registration-form', [AuthController::class, 'register'])->name('registration.form')->middleware('guest','web');
Route::post('/register/{idc}', [AuthController::class, 'saveRegister'])->name('register.store')->middleware('guest','web');



  
Route::get('/change-password-form', [PasswordController::class,'create'])->name('changePassword-form')->middleware('web');
Route::post('/change-password', [PasswordController::class,'changePassword'])->name('changePassword')->middleware('web');

  
Route::get('/forget-password-create', [PasswordController::class,'forgetpassword_create'])->name('forgetPassword.create')->middleware('guest','web');
Route::get('/forget-password-form', [PasswordController::class,'forgetPassword_form'])->name('forgetPassword.form')->middleware('guest','web');
Route::post('/forget-password/{idc}', [PasswordController::class,'saveForgetPassword'])->name('saveForgetPassword')->middleware('guest','web');




Route::get('/logout',[AuthController::class,'logout'])->name('logout');

  });