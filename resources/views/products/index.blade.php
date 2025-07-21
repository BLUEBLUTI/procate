@extends('layouts.app')
@section('content')
    <h2>Daftar Produk</h2>
    <a href="{{ route('products.create') }}">Tambah Produk</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if($products->count())
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>
                        <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                    </td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>{{ $product->stock->name ?? '-' }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada produk.</p>
    @endif
@endsection
