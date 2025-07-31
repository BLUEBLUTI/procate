@extends('layouts.app')
@section('content')
    <h2>Tambah Toko</h2>
    <form action="{{ route('shops.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required>
        <label>Alamat:</label>
        <input type="text" name="address" required>
        <label>Deskripsi:</label>
        <textarea name="description"></textarea>
        <button type="submit">Simpan</button>
    </form>
@endsection
