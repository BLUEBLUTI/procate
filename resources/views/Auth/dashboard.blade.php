 @extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Dashboard</h2>

        <div class="alert alert-info">
            Selamat datang, <strong>{{ auth()->user()->name }}</strong>! Anda login sebagai <strong>{{ auth()->user()->role }}</strong>.
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Kelola data pengguna sistem.</p>
                        <a href="{{  route('users.index') }}" class="btn btn-light btn-sm">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Kategori</h5>
                        <p class="card-text">Kelola kategori produk.</p>
                        <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Produk</h5>
                        <p class="card-text">Kelola data produk dan stok.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-light btn-sm">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pembelian</h5>
                        <p class="card-text">Kelola transaksi pembelian.</p>
                        <a href="{{ route('purchases.index') }}" class="btn btn-light btn-sm">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
