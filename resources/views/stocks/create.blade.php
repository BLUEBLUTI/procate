@extends('layouts.app')
@section('content')
    <h2>Stok Barang</h2>
    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required>
        <label>Stok:</label>
        <input type="number" name="quantity" min="0" required>
        <button type="submit">Simpan</button>
    </form>
@endsection
