@extends('layouts.app')
@section('content')
    <h2>Edit Produk</h2>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <label>Kategori:</label>
        <select name="category_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <select name="stock_id" required>
            <option value="">-- Pilih Satuan --</option>
            @foreach($stocks as $stock)
                <option value="{{ $stock->id }}" @if($product->stock_id == $stock->id) selected @endif>
                    {{ $stock->name }}
                </option>
            @endforeach
        </select>
        <label>Harga:</label>
        <input type="number" name="price" value="{{ $product->price }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
