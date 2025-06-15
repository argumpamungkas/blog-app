<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    $posts = Post::all();

    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

// post:slug => akan mencari data berdasarkan slugnya
Route::get('/posts/{post:slug}', function (Post $post) {
    // $post = Post::where('slug', $slug)->first();

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user}', function (User $user) {
    return view('author', ['title' => 'Author by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});
