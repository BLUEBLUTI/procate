@extends('auth.layout')
@section('content')
    <h2>Daftar Toko</h2>
    <a href="{{ route('shops.create') }}">Tambah Lokasi</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if($shops->count())
    <ul>
        @foreach ($shops as $shop)
            <li>
                <a href="{{ route('shops.show', $shop) }}">{{ $shop->name }}</a>
                <a href="{{ route('shops.edit', $shop) }}">Edit</a>
                <form action="{{ route('shops.destroy', $shop) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
    @else
        <p>Tidak ada toko</p>
    @endif
@endsection
