<?php

use App\Models\Category;
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

    // Eager Loading
    // $posts = Post::with(['author', 'category'])->latest()->get();

    // Cek dump input data
    // dump(request('search'));

    // $posts = Post::latest();

    // if (request('search')) {
    //    $posts->where('title', 'like', '%' . request('search') . '%');
    // }

    return view('posts', [
        'title' => 'Blog',
        // Utilizing a Local Scope
        'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()
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

    // Lazy Eager Loading
    // $posts = $user->posts->load('category', 'author'); 

    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {

    // Lazy Eager Loading
    // $posts = $category->posts->load('category', 'author');

    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
