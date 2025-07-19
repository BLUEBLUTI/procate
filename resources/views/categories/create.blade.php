@extends('layouts.app')
@section('content')
    <h2>Tambah Kategori</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required>
        <label>Deskripsi:</label>
        <textarea name="description"></textarea>
        <button type="submit">Simpan</button>
    </form>
@endsection
