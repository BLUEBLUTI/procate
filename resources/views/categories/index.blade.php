@extends('auth.layout')
@section('content')
    <h2>Daftar Kategori</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary" style="margin-bottom: 15px;">Tambah Kategori</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if($categories->count())
    <table border="1" cellpadding="8" cellspacing="0" style="width:100%; background:#fff;">
        <thead style="background:#f8f9fa;">
            <tr>
                <th style="width:50px;">#</th>
                <th>Nama Kategori</th>
                <th style="width:180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $i => $category)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Tidak ada kategori.</p>
    @endif
@endsection
