<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            // $table->string('author'); ==> diganti dengan foreign key
            // $table->unsignedBigInteger('author_id');
            // $table->foreign('author_id')->references('id')->on('users'); // relasi ke table users

            // menggunakan ini karena nama tablenya bukan author
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_author_id', // nyambungin table post dengan author id
            );
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories'); // relasi ke table users
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
