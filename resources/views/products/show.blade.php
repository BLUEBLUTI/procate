@extends('layouts.app')
@section('content')
    <h2>Detail Produk</h2>
    <p><strong>Nama:</strong> {{ $product->name }}</p>
    <p><strong>Kategori:</strong> {{ $product->category->name ?? '-' }}</p>
    <p><strong>Stok:</strong> {{ $product->stock }}</p>
    <p><strong>Harga:</strong> {{ number_format($product->price, 0, ',', '.') }}</p>
    <a href="{{ route('products.index') }}">Kembali</a>
@endsection
