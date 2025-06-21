<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory; // digunakan untuk menggunakan factory
    // INI FUNGSI JIKA NAMA TABLE NYA BUKAN POSTS (PLURAL)
    // protected $table = 'blog_posts';

    protected $fillable = ['title', 'author', 'slug', 'description']; // yang boleh diisi
    // protected $guarded = ['id']; // yang tidak boleh diisi, sisanya boleh

    // EAGER LOADING digunakan sebaiknya jika dalam view nya melakukan looping, jika relasi untuk 1 data saja LAZY LOADING saja cukup
    // Untuk eager loading pada relasi maka tambahkan
    protected $with = ['author', 'category']; // mengambil dari fungsi yang sudah ditetapkan pada routes web

    // One Post -> One Author (One to One)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 1 post hanya dimiliki oleh 1 kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    #[Scope]
    protected function filter(Builder $query, array $filters): void
    {
        // URL -> posts?search=
        //ketika filters[search] ada isinya / berisi keyword / bernilai true => jalankan callback
        // $search disini akan mengambil dari request(['search']) yang ada di routes
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });

        // category
        // akan menjalankan jika kita berada di category => URL -> posts?category=
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas(
                'category',
                fn(Builder $query) =>
                $query->where('slug', $category)
            ); // cari akan ada di inputan ?
        });

        // category
        // akan menjalankan jika kita berada di author => URL -> posts?author=
        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas(
                'author',
                fn(Builder $query) =>
                $query->where('username', $author)
            ); // cari akan ada di inputan ?
        });
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
