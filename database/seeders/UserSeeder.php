<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // memanggil data dari create, sisa nya ngambil dari factory
        User::factory()->create([
            'name' => 'Argumelar Pamungkas',
            'username' => 'argumpamungkas',
            'email' => 'argump@gmail.com',
            'password' => Hash::make('pwd12345'),
        ]);

        // sisanya generate user
        User::factory(9)->create();
    }
}
