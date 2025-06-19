<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // memanggil seeder kategori yg sudah ditentukan
        $this->call([CategorySeeder::class, UserSeeder::class, PostSeeder::class]);


        // php artisan db:seed
        // User::factory()->create([
        //     'name' => 'Argumelar', // name  nya ini dan email. sisanya diambil dari factory
        //     'email' => 'argum@example.com',
        //     'username' => 'argumpamungkas',
        // ]);
    }
}
