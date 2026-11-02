<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Laskar Pelangi', 'description' => 'Kisah sepuluh anak di Belitung yang berjuang bersekolah.', 'price' => 85000, 'stock' => 20, 'cover_photo' => 'laskar-pelangi.jpg', 'genre_id' => 1, 'author_id' => 1],
            ['title' => 'Bumi', 'description' => 'Petualangan Raib dan dunia paralel.', 'price' => 90000, 'stock' => 15, 'cover_photo' => 'bumi.jpg', 'genre_id' => 1, 'author_id' => 2],
            ['title' => 'Bumi Manusia', 'description' => 'Novel sejarah awal pergerakan nasional.', 'price' => 110000, 'stock' => 10, 'cover_photo' => 'bumi-manusia.jpg', 'genre_id' => 4, 'author_id' => 3],
            ['title' => 'Supernova: Ksatria, Puteri, dan Bintang Jatuh', 'description' => 'Novel pertama seri Supernova.', 'price' => 95000, 'stock' => 12, 'cover_photo' => 'supernova.jpg', 'genre_id' => 1, 'author_id' => 4],
            ['title' => 'Ayat-Ayat Cinta', 'description' => 'Kisah mahasiswa Indonesia di Kairo.', 'price' => 80000, 'stock' => 25, 'cover_photo' => 'ayat-ayat-cinta.jpg', 'genre_id' => 1, 'author_id' => 5],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}