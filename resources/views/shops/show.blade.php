@extends('layouts.app')
@section('content')
    <h2>Detail Kategori</h2>
    <p><strong>Nama:</strong> {{ $shop->name }}</p>
    <p><strong>Alamat:</strong> {{ $shop->address }}</p>
    <p><strong>Deskripsi:</strong> {{ $shop->description }}</p>
    <a href="{{ route('shops.index') }}">Kembali</a>
@endsection
