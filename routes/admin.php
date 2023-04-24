<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

Route::group(['middleware' => 'isLogin'], function () {

    Route::get('/',[AdminController::class,'index'])->name('dashboard');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');

    Route::resources([
        'users' => UserController::class,
        'posts' => PostController::class,
        'categories' => CategoryController::class,
        'pages' => PageController::class,
    ]);
});


Route::group(['middleware' => 'noLogin'], function () {

    Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::post('/login-submit',[AuthController::class,'login'])->name('login_submit');

});