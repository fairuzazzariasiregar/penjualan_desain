@extends('app')

@section('title', 'Edit Status Pesanan')
@section('header', 'Edit Status Pesanan')

@section('content')

<style>
    .form-card {
        max-width: 720px;
        margin: auto;
        background: #ffffff;
        padding: 35px 40px;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0,0,0,.08);
    }

    .form-card h3 {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .form-card p {
        color: #64748b;
        margin-bottom: 25px;
    }

    .info-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
        background: transparent;
    }

    .info-table th,
    .info-table td {
        background: transparent !important;
        color: #111827 !important;
        padding: 10px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .info-table th {
        font-weight: 500;
        width: 160px;
        color: #475569 !important;
    }

    .form-group {
        margin-bottom: 28px;
    }

    .form-group label {
        display: block;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .form-select {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        font-size: 14px;
        background: #fff;
    }

    .form-select:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,.15);
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
        padding: 10px 22px;
        border-radius: 10px;
        border: none;
        font-weight: 500;
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #374151;
        padding: 10px 18px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 500;
    }
</style>

<div class="form-card">

    {{-- HEADER --}}
    <h3>Edit Status Pesanan</h3>
    <p>Perbarui status pesanan pelanggan</p>

    {{-- INFO ORDER --}}
    <table class="info-table">
        <tr>
            <th>Customer</th>
            <td>{{ $order->customer_name }}</td>
        </tr>
        <tr>
            <th>Service</th>
            <td>{{ $order->service->nama_service }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d-m-Y') }}</td>
        </tr>
    </table>

    {{-- FORM --}}
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Status Pesanan</label>
            <select name="status" class="form-select" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="proses" {{ $order->status == 'proses' ? 'selected' : '' }}>
                    Proses
                </option>
                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>
                    Selesai
                </option>
            </select>
        </div>

        {{-- ACTION --}}
        <div class="form-actions">
            <a href="{{ route('orders.index') }}" class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn-primary">
                Update Status
            </button>
        </div>

    </form>

</div>

@endsection
