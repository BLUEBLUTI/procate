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
        <label>Stok:</label>
        <input type="number" name="stock" value="{{ $product->stock }}" required>
        <label>Harga:</label>
        <input type="number" name="price" value="{{ $product->price }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
