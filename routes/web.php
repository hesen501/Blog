<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'noLogin'], function () {


Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login-submit',[AuthController::class,'login'])->name('login_submit');

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/post/{slug}',[HomeController::class,'post_single'])->name('post-single');
Route::get('/category/{slug}',[HomeController::class,'category'])->name('category');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/page/{page}',[HomeController::class,'page'])->name('page');
Route::post('/send',[HomeController::class,'send'])->name('send');

});