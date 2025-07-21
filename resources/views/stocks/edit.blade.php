@extends('layouts.app')
@section('content')
    <h2>Edit Stok</h2>
    <form action="{{ route('stocks.update', $stock) }}" method="POST">
        @csrf @method('PUT')
        <label>Nama:</label>
        <input type="text" name="name" value="{{ $stock->name }}" required>
        <label>Deskripsi:</label>
        <textarea name="description">{{ $stock->description }}</textarea>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('stocks.index') }}">Kembali ke Daftar Stok</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif
    <a href="{{ route('stocks.index') }}">Lihat Semua Stok</a>
    <a href="{{ route('stocks.create') }}">Tambah Stok Baru</a>
    <a href="{{ route('stocks.show', $stock) }}">Lihat Stok Ini</a>
    <form action="{{ route('stocks.destroy', $stock) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button type="submit" onclick="return confirm('Yakin hapus stok ini?')">Hapus Stok</button>
    </form>
@endsection
