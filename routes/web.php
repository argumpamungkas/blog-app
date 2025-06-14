<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    $posts = [
        [
            'id' => 1,
            'slug' => 'captain-tsubasa-road-to-world-cup',
            'title' => 'Captain Tsubasa Road to World Cup',
            'author' => 'Yoichi Takahashi',
            'date' => '13 Juli 1985',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi laudantium ea, voluptatibus corporis voluptas eaque quidem eveniet voluptatem eligendi dolorum doloremque laboriosam, dicta magnam odit soluta quam perferendis, molestiae recusandae tempore non sequi nobis nam asperiores! Labore mollitia sunt velit.',
        ],
        [
            'id' => 2,
            'slug' => 'ao-ashi-s1',
            'title' => 'Ao Ashi S1',
            'author' => 'Yugo Kobayashi',
            'date' => '12 July 2021',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, excepturi!',
        ],
        [
            'id' => 3,
            'slug' => 'blue-lock',
            'title' => 'Blue Lock',
            'author' => 'Muneyuki Kaneshiro',
            'date' => '09 June 2022',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi laudantium ea, voluptatibus corporis voluptas eaque quidem eveniet voluptatem eligendi dolorum doloremque laboriosam.',
        ],
    ];
    // dd($posts);
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'captain-tsubasa-road-to-world-cup',
            'title' => 'Captain Tsubasa Road to World Cup',
            'author' => 'Yoichi Takahashi',
            'date' => '13 Juli 1985',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi laudantium ea, voluptatibus corporis voluptas eaque quidem eveniet voluptatem eligendi dolorum doloremque laboriosam, dicta magnam odit soluta quam perferendis, molestiae recusandae tempore non sequi nobis nam asperiores! Labore mollitia sunt velit.',
        ],
        [
            'id' => 2,
            'slug' => 'ao-ashi-s1',
            'title' => 'Ao Ashi S1',
            'author' => 'Yugo Kobayashi',
            'date' => '12 July 2021',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, excepturi!',
        ],
        [
            'id' => 3,
            'slug' => 'blue-lock',
            'title' => 'Blue Lock',
            'author' => 'Muneyuki Kaneshiro',
            'date' => '09 June 2022',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi laudantium ea, voluptatibus corporis voluptas eaque quidem eveniet voluptatem eligendi dolorum doloremque laboriosam.',
        ],
    ];

    // penggunaan use (digunakan untuk mengambil variable yang diluar function yg akan digunakan)
    // ambil data pertama dari array
    $post = Arr::first($posts, function ($post) use ($slug) {
        //perbedaan == dan === adalahan jika === maka value dan type data di cek, jika == maka hanya value nya saja yg dicek
        return $post['slug'] == $slug;
    });

    // dd($first);

    // jika post nya kosong atau tidak ada maka tampilkan abort 404
    if (!$post) abort(404);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});