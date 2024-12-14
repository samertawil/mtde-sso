<?php

use Illuminate\Support\Facades\Route;

 

include __DIR__ . '/authRoutes.php';
 


Route::get('test', function () {
    return view('pack::test');
})->middleware('web',)->name('home');