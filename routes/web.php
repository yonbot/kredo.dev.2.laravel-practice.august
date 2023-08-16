<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** Eloquent */
#CREATE
Route::get('/store/save', [PostController::class, 'save']);
Route::get('/store/create', [PostController::class, 'create']);

#UPDATE
Route::get('/update/{post_id}', [PostController::class, 'update']);

#DELETE
Route::get('/destroy/{post_id}', [PostController::class, 'destroy']);

#READ
Route::get('/read-all', [PostController::class, 'index']);
Route::get('/read/{post_id}', [PostController::class, 'show']);
Route::get('/read-where/{post_id}', [PostController::class, 'showWhere']);

Route::get('/post', [PostController::class, 'index']);

Route::get('/post/{post_id}', [PostController::class, 'viewPost']);

Route::get('/post/{username}/{post_id}', [PostController::class, 'viewUserPost']);

Route::get('/view-all', [PostController::class, 'viewAllPosts']);

Route::get('/show/{username}', [PostController::class, 'show']);


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello";
});

Route::get('/hello/user', function () {
    return "Hello World!";
});

Route::get('/hello/{user_id}', function ($user_id) {
    return "Hello User $user_id";
});

Route::get('/{username}/post/{post_id}', function ($username, $post_id) {
    return "Post $post_id. This is the post of $username";
});

Route::get('/dashboard/admin', function () {
    return "Welcome Admin!";
})->name('adm');

Route::get('/dashboard/subscriber', function () {
    return "Welcome subscriber!";
})->name('sub');

Route::get('/login', function () {
    return redirect()->route('adm');
});

//get
//post
//patch
//delete
//group