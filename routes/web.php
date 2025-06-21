<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    // EAGER LOADING
    // author & category menjadi eager loading (agar manggil user berdasarkan id di post hanya sekali/ menggunakan query in)
    // $posts = Post::with(['author', 'category'])->latest()->get();
    $posts = Post::latest()->get();

    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

// post:slug => akan mencari data berdasarkan slugnya (route model binding)
Route::get('/posts/{post:slug}', function (Post $post) {
    // $post = Post::where('slug', $slug)->first();

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    // LAZY EAGER LOADING
    // load(relasi) -> (lazy eager loading)
    // fungsi laravel akan secara otomatis mengambil DATA RELASI category dan author dari semua post yg diambil
    // $posts = $user->posts->load('category', 'author'); // user -> has many post, post -> belongsto category and author 

    return view('author', ['title' => count($user->posts) .  ' Author by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    // LAZY EAGER LOADING
    // $posts = $category->posts->load('category', 'author');

    return view('posts', ['title' => 'Category by ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
