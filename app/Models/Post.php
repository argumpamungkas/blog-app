<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public static function find($slug)
    // {
    //     // penggunaan use (digunakan untuk mengambil variable yang diluar function yg akan digunakan)
    //     // ambil data pertama dari array (static::all())
    //     // return Arr::first(static::all(), function ($post) use ($slug) {
    //     //     //perbedaan == dan === adalahan jika === maka value dan type data di cek, jika == maka hanya value nya saja yg dicek
    //     //     return $post['slug'] == $slug;
    //     // });

    //     // ARROW FUNCTION ?? jika tidak ada isinya maka abort(404)
    //     return Arr::first(static::all(), fn($post) => $post['slug'] == $slug) ?? abort(404);
    // }
}
