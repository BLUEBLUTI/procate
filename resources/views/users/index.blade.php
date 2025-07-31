@extends('auth.layout')
@section('content')
    <h2>Daftar Pengguna</h2>
    <a href="{{ route('users.create') }}">Tambah Pengguna</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    @if($users->count())
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                    ({{ $user->role }})
                    <a href="{{ route('users.edit', $user) }}">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada pengguna.</p>
    @endif
@endsection
