@extends('layouts.app')
@section('content')
    <h2>Edit Kategori</h2>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf @method('PUT')
        <label>Nama:</label>
        <input type="text" name="name" value="{{ $category->name }}" required>
        <label>Deskripsi:</label>
        <textarea name="description">{{ $category->description }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
