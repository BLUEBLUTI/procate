@extends('auth.layout')
@section('content')
    <h2>Detail Kategori</h2>
    <p><strong>Nama:</strong> {{ $category->name }}</p>
    <p><strong>Deskripsi:</strong> {{ $category->description }}</p>
    <a href="{{ route('categories.index') }}">Kembali</a>
@endsection
