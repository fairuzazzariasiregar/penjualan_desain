@extends('app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')

<div class="stats">
    <div class="stat-card">
        <div class="icon bg-primary">📦</div>
        <div>
            <h6>Total Orders</h6>
            <h2>{{ $totalOrders ?? 0 }}</h2>
            <span>Pesanan Masuk</span>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon bg-info">🛠</div>
        <div>
            <h6>Total Services</h6>
            <h2>{{ $totalServices ?? 0 }}</h2>
            <span>Jenis Jasa</span>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon bg-success">✅</div>
        <div>
            <h6>Orders Selesai</h6>
            <h2>{{ $ordersSelesai ?? 0 }}</h2>
            <span>Status Selesai</span>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon bg-warning">💰</div>
        <div>
            <h6>Pendapatan</h6>
            <h2>Rp {{ number_format($totalPendapatan ?? 0) }}</h2>
            <span>Total Omzet</span>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Pesanan Terbaru</h3>
        <a href="{{ route('orders.index') }}" class="btn">Lihat Semua</a>
    </div>

    <div class="table-responsive">
        <table class="table-modern">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentOrders ?? [] as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->service->nama_service }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d-m-Y') }}</td>
                    <td>
                        <span class="status-badge {{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pesanan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
