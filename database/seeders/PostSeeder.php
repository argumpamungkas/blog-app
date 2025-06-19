<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // php artisan migrate:fresh --seed => bersihkan database lalu jalankan seeder
        Post::factory(30)->recycle([
            Category::all(), // akan menjalankan semua yang ada pada seeder category
            User::all(), // menjalankan semua yang ada pada seeder user
        ])->create();
    }
}
