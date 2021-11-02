<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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
Route::post('newsletter',function (){
    request()->validate(['email'=>'required|email']);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us5'
    ]);
    try {
        $response = $mailchimp->lists->addListMember('471fc4a5a8',[
            'email_address'=>request('email'),
            'status'=>'subscribed'
        ]);
    } catch (\Exception $e){
        throw \Illuminate\Validation\ValidationException::withMessages([
           'email'=>'This email can not be added'
        ]);
    }

    return redirect('/')->with('success','Subscription added');
});
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
