@extends('layouts.app')
@section('content')
    <h2>Daftar Stok</h2>
    <a href="{{ route('stocks.create') }}">Tambah Stok</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if($stocks->count())
    <ul>
        @foreach ($stocks as $stock)
            <li>
                <a href="{{ route('stocks.show', $stock) }}">{{ $stock->name }}</a>
                <a href="{{ route('stocks.edit', $stock) }}">Edit</a>
                <form action="{{ route('stocks.destroy', $stock) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
    @else
        <p>Tidak ada stok.</p>
    @endif
@endsection
