@extends('layouts.app')

@section('content')
    <h2>Daftar Transaksi Pembelian</h2>
    <a href="{{ route('purchases.create') }}">Tambah Transaksi</a>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>User</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->purchase_date }}</td>
                    <td>{{ $purchase->user->name }}</td>
                    <td>Rp {{ number_format($purchase->total_amount, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('purchases.show', $purchase->id) }}">Lihat</a> |
                        <a href="{{ route('purchases.edit', $purchase->id) }}">Edit</a> |
                        <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
