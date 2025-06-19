<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Buat relasi pada modelnya
        // App\Models\Post::factory(50)->recycle(User::factory(7)->create())->create(); (penggunaan)
        $title = fake()->sentence(rand(1, 4));
        return [
            'title' => $title,
            'author_id' => User::factory(), // memanggil factory dari user
            'category_id' => Category::factory(), // memamnggil factory dari category
            'slug' => Str::slug($title),
            'description' => fake()->text(rand(100, 200)),
            // 'created_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
