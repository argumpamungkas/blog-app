<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // init category
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Mobile Developer',
            'slug' => 'mobile-developer',
        ]);

        Category::create([
            'name' => 'Full Stack Developer',
            'slug' => 'full-stack-developer',
        ]);
    }
}
