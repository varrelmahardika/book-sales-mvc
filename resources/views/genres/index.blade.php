@extends('layouts.app')

@section('title', 'Data Genre')

@section('content')
    <h1>Data Genre</h1>
    <table>
        <thead>
            <tr><th>ID</th><th>Nama</th><th>Deskripsi</th></tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre['id'] }}</td>
                    <td>{{ $genre['name'] }}</td>
                    <td>{{ $genre['description'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection