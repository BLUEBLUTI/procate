@extends('layouts.app')
@section('content')
    <h2>Tambah Produk</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required>
        <label>Kategori:</label>
        <select name="category_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label>Stok:</label>
        <input type="number" name="stock" required>
        <label>Harga:</label>
        <input type="number" name="price" required>
        <button type="submit">Simpan</button>
    </form>
@endsection
