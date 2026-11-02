<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            ['name' => 'Andrea Hirata',            'photo' => 'andrea.jpg',   'bio' => 'Penulis novel Laskar Pelangi.'],
            ['name' => 'Tere Liye',                'photo' => 'tereliye.jpg', 'bio' => 'Penulis novel populer Indonesia.'],
            ['name' => 'Pramoedya Ananta Toer',    'photo' => 'pram.jpg',     'bio' => 'Sastrawan Indonesia, penulis Tetralogi Buru.'],
            ['name' => 'Dee Lestari',              'photo' => 'dee.jpg',      'bio' => 'Penulis seri Supernova.'],
            ['name' => 'Habiburrahman El Shirazy', 'photo' => 'habib.jpg',    'bio' => 'Penulis novel Ayat-Ayat Cinta.'],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}