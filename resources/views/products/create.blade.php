@extends('auth.layout')
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
        <select name="stock_id" required>
            <option value="">-- Pilih Satuan --</option>
            @foreach($stocks as $stock)
                <option value="{{ $stock->id }}">{{ $stock->name }}</option>
            @endforeach
        </select>
        <label>Toko:</label>
        <select name="shop_id" required>
            <option value="">-- Pilih Toko --</option>
            @foreach($shops as $shop)
                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
            @endforeach
        </select>
        <label>Harga:</label>
        <input type="number" name="price" required>
        <button type="submit">Simpan</button>
    </form>
@endsection
