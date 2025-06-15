<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    use HasFactory; // digunakan untuk menggunakan factory
    // INI FUNGSI JIKA NAMA TABLE NYA BUKAN POSTS (PLURAL)
    // protected $table = 'blog_posts';

    protected $fillable = ['title', 'author', 'slug', 'description']; // yang boleh diisi
    // protected $guarded = ['id']; // yang tidak boleh diisi, sisanya boleh

    // One Post -> One Author (One to One)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


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
