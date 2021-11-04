<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use Illuminate\Validation\ValidationException;

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
Route::post('newsletter', NewsletterController::class);
Route::get('/', [PostController::class,'index'])->name('home');
Route::get('posts/{post:slug}',[PostController::class,'show']);

Route::get('categories/{category:slug}',function (Category $category){
    return view('posts',[

        'posts' => $category-> posts,
        'currentCategory'=>$category,
        'categories'=>Category::all()
    ]);
})->name('category');

Route::get('authors/{author}',function (Category $author){
    return view('posts',[

        'posts' => $author-> posts,
        'categories'=>Category::all()
    ]);
})->name('author');

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');
Route::post('posts/{post:slug}/comments',[PostCommentsController::class,'store']);

Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');
Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store']);

Route::get('admin/posts/create',[PostController::class,'create'])->middleware('admin');
Route::post('admin/posts',[PostController::class,'store'])->middleware('admin');
