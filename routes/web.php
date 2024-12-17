<?php

use Illuminate\Support\Facades\Route;

 

include __DIR__ . '/authRoutes.php';
 

 route::get('test',function() {
    return 'samer';
 })->middleware('web','ssoAuth');