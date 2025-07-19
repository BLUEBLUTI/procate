@extends('layouts.app')
@section('content')
    <h2>Edit Pengguna</h2>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <label>Role:</label>
        <input type="text" name="role" value="{{ $user->role }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
