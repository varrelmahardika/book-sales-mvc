@extends('layouts.app')

@section('title', 'Data Author')

@section('content')
    <h1>Data Author</h1>
    <table>
        <thead>
            <tr><th>ID</th><th>Nama</th><th>Foto</th><th>Bio</th></tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author['id'] }}</td>
                    <td>{{ $author['name'] }}</td>
                    <td>{{ $author['photo'] }}</td>
                    <td>{{ $author['bio'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection