<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Muhammad Arginanta Kafi Sambada', 'title' => 'About']);
});


// Untuk menampilkan seluruh data posts
Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

// Whild Card
Route::get('/posts/{post:slug}', function (Post $post) {

    // Arr:: adalah fungsi Array, Sedangkan fungsi First mencari element array yang pertama kali ketemu, berdasarkan kriteria tertentu 
    // $post = Post::find($slug);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

// {user} = ini maskudnya akses berdasarkan id di model user 
Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
