@extends('auth.layout')
@section('content')
    <h2>Tambah Pengguna</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <label>Role:</label>
        <input type="text" name="role" required>
        <button type="submit">Simpan</button>
    </form>
@endsection
