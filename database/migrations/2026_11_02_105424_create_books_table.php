<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->string('cover_photo', 255)->nullable();
            $table->integer('genre_id')->nullable();
            $table->integer('author_id');

            $table->foreign('author_id')->references('id')->on('authors')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};