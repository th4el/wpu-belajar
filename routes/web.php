<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Models\Post;
use App\Models\User;

Route::get('/', function () {
    return view('welcome', ['title' => "Home Page"]);
});

Route::get('/posts', function () {
    return view('posts', ['title' => "Blog", 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function(Post $post) {
    return view('post', ['title' => "Single Post", 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    return view('posts', ['title' => count($user->posts) . " Articles by " . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', ['title' => " Articles in Category: " . $category->name, 'posts' => $category->posts]);
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