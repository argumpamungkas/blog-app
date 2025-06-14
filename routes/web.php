<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    $posts = [
        [
            'title' => 'Captain Tsubasa Road to World Cup',
            'author' => 'Yoichi Takahashi',
            'date' => '13 Juli 1985',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi laudantium ea, voluptatibus corporis voluptas eaque quidem eveniet voluptatem eligendi dolorum doloremque laboriosam, dicta magnam odit soluta quam perferendis, molestiae recusandae tempore non sequi nobis nam asperiores! Labore mollitia sunt velit.',
        ],
        [
            'title' => 'Ao Ashi S1',
            'author' => 'Yugo Kobayashi',
            'date' => '12 July 2021',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, excepturi!',
        ],
        [
            'title' => 'Blue Lock',
            'author' => 'Muneyuki Kaneshiro',
            'date' => '09 June 2022',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi laudantium ea, voluptatibus corporis voluptas eaque quidem eveniet voluptatem eligendi dolorum doloremque laboriosam.',
        ],
    ];
    // dd($posts);
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});