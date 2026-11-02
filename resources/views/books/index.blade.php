@extends('layouts.app')

@section('title', 'Data Book')

@section('content')
    <h1>Data Book</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Judul</th><th>Deskripsi</th><th>Harga</th>
                <th>Stok</th><th>Cover</th><th>Genre ID</th><th>Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>{{ $book->cover_photo }}</td>
                    <td>{{ $book->genre_id }}</td>
                    <td>{{ $book->author->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection