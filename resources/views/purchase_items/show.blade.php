@extends('auth.layout')

@section('content')
    <h2>Detail Transaksi Pembelian</h2>

    <p><strong>ID:</strong> {{ $purchase->id }}</p>
    <p><strong>User:</strong> {{ $purchase->user->name }}</p>
    <p><strong>Tanggal:</strong> {{ $purchase->purchase_date }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($purchase->total_amount, 0, ',', '.') }}</p>

    <a href="{{ route('purchases.index') }}">Kembali ke Daftar</a>
@endsection
