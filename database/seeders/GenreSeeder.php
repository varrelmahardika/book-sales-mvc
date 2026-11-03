<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            ['name' => 'Fiksi',     'description' => 'Cerita rekaan seperti novel dan cerpen.'],
            ['name' => 'Non-Fiksi', 'description' => 'Buku berbasis fakta dan pengetahuan nyata.'],
            ['name' => 'Teknologi', 'description' => 'Buku seputar pemrograman dan teknologi.'],
            ['name' => 'Sejarah',   'description' => 'Buku tentang peristiwa dan tokoh masa lalu.'],
            ['name' => 'Biografi',  'description' => 'Kisah hidup seorang tokoh.'],
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}