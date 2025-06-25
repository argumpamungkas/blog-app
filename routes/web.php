<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    // EAGER LOADING
    // author & category menjadi eager loading (agar manggil user berdasarkan id di post hanya sekali/ menggunakan query in)
    // $posts = Post::with(['author', 'category'])->latest()->get();

    // withQueryString berfungsi untuk melihat apakah kita dalam request tertentu ?
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(); // menggunakan query scope yang ada dimodel

    // if (request('search')) {
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }

    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

// post:slug => akan mencari data berdasarkan slugnya (route model binding)
Route::get('/posts/{post:slug}', function (Post $post) {
    // $post = Post::where('slug', $slug)->first();

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

// Route::get('/authors/{user:username}', function (User $user) {
//     // LAZY EAGER LOADING
//     // load(relasi) -> (lazy eager loading)
//     // fungsi laravel akan secara otomatis mengambil DATA RELASI category dan author dari semua post yg diambil
//     // $posts = $user->posts->load('category', 'author'); // user -> has many post, post -> belongsto category and author 

//     return view('author', ['title' => count($user->posts) .  ' blog. Author by ' . $user->name, 'posts' => $user->posts]);
// });

// Route::get('/categories/{category:slug}', function (Category $category) {
//     // LAZY EAGER LOADING
//     // $posts = $category->posts->load('category', 'author');

//     return view('posts', ['title' => 'Category ' . $category->name, 'posts' => $category->posts]);
// });

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
