<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

use CodeSinging\PinAdmin\Facades\Admin;
use Illuminate\Support\Facades\Route;

Admin::routeGroup(function (){

    Route::get('auth', [\CodeSinging\PinAdmin\Http\Controllers\AuthController::class, 'index'])->name('auth');

}, false);

Admin::routeGroup(function (){

    Route::get('/', [\CodeSinging\PinAdmin\Http\Controllers\IndexController::class, 'index'])->name('index.index');

});
