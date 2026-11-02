<?php

namespace App\Models;

class Author
{
    public static function all()
    {
        return [
            ['id' => 1, 'name' => 'Andrea Hirata',           'photo' => 'andrea.jpg',   'bio' => 'Penulis novel Laskar Pelangi.'],
            ['id' => 2, 'name' => 'Tere Liye',               'photo' => 'tereliye.jpg', 'bio' => 'Penulis novel populer Indonesia.'],
            ['id' => 3, 'name' => 'Pramoedya Ananta Toer',   'photo' => 'pram.jpg',     'bio' => 'Sastrawan Indonesia, penulis Tetralogi Buru.'],
            ['id' => 4, 'name' => 'Dee Lestari',             'photo' => 'dee.jpg',      'bio' => 'Penulis seri Supernova.'],
            ['id' => 5, 'name' => 'Habiburrahman El Shirazy','photo' => 'habib.jpg',    'bio' => 'Penulis novel Ayat-Ayat Cinta.'],
        ];
    }
}