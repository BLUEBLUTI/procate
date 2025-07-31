@extends('auth.layout')

@section('content')
    <h2>Edit Transaksi Pembelian</h2>

    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
        @csrf @method('PUT')

        <div>
            <label for="user_id">User:</label>
            <select name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $purchase->user_id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->role }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="purchase_date">Tanggal Pembelian:</label>
            <input type="date" name="purchase_date" value="{{ $purchase->purchase_date }}" required>
        </div>

        <div>
            <label for="total_amount">Total Pembelian (Rp):</label>
            <input type="number" name="total_amount" value="{{ $purchase->total_amount }}" step="0.01" required>
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('purchases.index') }}">Kembali</a>
    </form>
@endsection
