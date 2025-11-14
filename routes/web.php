<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Arr;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome', ['title' => "Home Page"]);
});

Route::get('/posts', function () {
    return view('posts', ['title' => "Blog", 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function(Post $post) {

    return view('post', ['title' => "Single Post", 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => "Contact"]);
});

Route::get('/about', function () {
    return view('about', ['title' => "About"]);
});

Route::get('/home', function () {
    return view('home');
});

//SoftDelete
Route::get('/softdel', [PostController::class, 'index']);
Route::delete('/softdel/{id}', [PostController::class, 'destroy']);
Route::get('softdel/trash', [PostController::class, 'trash']);
Route::patch('/softdel/{id}/restore', [PostController::class, 'restore']);
Route::delete('/softdel/{id}/force-delete', [PostController::class, 'forceDelete']);