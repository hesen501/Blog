<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MessageController;

Route::group(['middleware' => 'isLogin'], function () {

    Route::get('/',[AdminController::class,'index'])->name('dashboard');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/post/delete/{id}',[PostController::class,'postDelete'])->name('postDelete');


    Route::resources([
        'users'         => UserController::class,
        'posts'         => PostController::class,
        'categories'    => CategoryController::class,
        'pages'         => PageController::class,
        'messages'      => MessageController::class,
    ]);
});
Route::get('pages/sort', [PageController::class, 'sort'])->name('pages.sort');


Route::group(['middleware' => 'noLogin'], function () {

    Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::post('/login-submit',[AuthController::class,'login'])->name('login_submit');

});