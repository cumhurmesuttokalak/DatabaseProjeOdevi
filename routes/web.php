<?php

use App\Http\Controllers\YonetimController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/be', function () {
    return view('admin/anasayfa');
});

Route::group(['prefix' => 'panel','middleware' => 'auth'] ,function () {
    Route::get('/',[YonetimController::class,'index'])->name('dashboard');


    Route::group(['prefix' => '/posts'], function (){
        Route::get('/',[YonetimController::class,'posts_list'])->name('panel.posts.list');
        Route::get('/create',[YonetimController::class,'posts_create'])->name('panel.posts.create');
        Route::post('/create',[YonetimController::class,'posts_store'])->name('panel.posts.store');
        Route::get('/update',[YonetimController::class,'posts_update'])->name('panel.posts.update');
        Route::post('/update',[YonetimController::class,'posts_update'])->name('panel.posts.updatee');
        Route::get('/destroy/{id}',[YonetimController::class,'posts_destroy'])->name('panel.posts.destroy');
        Route::post('/destroy/{id}',[YonetimController::class,'posts_destroy'])->name('panel.posts.destroy');
        Route::get('/comments/{id}',[YonetimController::class,'posts_comments'])->name('panel.posts.comments');
        Route::get('/comments/destroy/{post_id}/{comment_id}',[YonetimController::class,'posts_comments_destroy'])->name('panel.posts.comments.destroy');
        Route::post('/comments/destroy/{post_id}/{comment_id}',[YonetimController::class,'posts_comments_destroy'])->name('panel.posts.comments.destroy');




    });

});
