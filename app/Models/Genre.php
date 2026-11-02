<?php

namespace App\Models;

class Genre
{
    public static function all()
    {
        return [
            ['id' => 1, 'name' => 'Fiksi',     'description' => 'Cerita rekaan seperti novel dan cerpen.'],
            ['id' => 2, 'name' => 'Non-Fiksi', 'description' => 'Buku berbasis fakta dan pengetahuan nyata.'],
            ['id' => 3, 'name' => 'Teknologi', 'description' => 'Buku seputar pemrograman dan teknologi.'],
            ['id' => 4, 'name' => 'Sejarah',   'description' => 'Buku tentang peristiwa dan tokoh masa lalu.'],
            ['id' => 5, 'name' => 'Biografi',  'description' => 'Kisah hidup seorang tokoh.'],
        ];
    }
}