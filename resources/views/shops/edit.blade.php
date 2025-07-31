@extends('layouts.app')
@section('content')
    <h2>Edit Toko</h2>
    <form action="{{ route('shops.update', $shop) }}" method="POST">
        @csrf @method('PUT')
        <label>Nama:</label>
        <input type="text" name="name" value="{{ $shop->name }}" required>
        <label>Alamat:</label>
        <input type="text" name="address" value="{{ $shop->address }}" required>
        <label>Deskripsi:</label>
        <textarea name="description">{{ $shop->description }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
