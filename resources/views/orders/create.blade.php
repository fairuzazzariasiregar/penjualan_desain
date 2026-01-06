@extends('app')

@section('title', 'Tambah Pesanan')
@section('header', 'Tambah Pesanan')

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
        margin-bottom: 5px;
    }

    .form-card p {
        color: #64748b;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        font-size: 14px;
        transition: .2s;
        background: #fff;
    }

    .form-control:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,.15);
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
        font-weight: 500;
        cursor: pointer;
    }

    .btn-primary:hover {
        background: #1e40af;
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #374151;
        padding: 10px 18px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 500;
    }

    .btn-secondary:hover {
        background: #d1d5db;
    }
</style>

<div class="form-card">

    {{-- HEADER --}}
    <h3>Tambah Pesanan</h3>
    <p>Input data pemesanan jasa pelanggan</p>

    {{-- FORM --}}
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        {{-- CUSTOMER --}}
        <div class="form-group">
            <label>Nama Customer</label>
            <input
                type="text"
                name="customer_name"
                class="form-control"
                required
            >
        </div>

        {{-- SERVICE --}}
        <div class="form-group">
            <label>Pilih Service</label>
            <select name="service_id" class="form-control" required>
                <option value="">-- Pilih Service --</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->nama_service }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- TANGGAL --}}
        <div class="form-group">
            <label>Tanggal Pesanan</label>
            <input
                type="date"
                name="tanggal_pesan"
                class="form-control"
                required
            >
        </div>

        {{-- STATUS --}}
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        {{-- ACTION --}}
        <div class="form-actions">
            <a href="{{ route('orders.index') }}" class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn-primary">
                Simpan Pesanan
            </button>
        </div>

    </form>

</div>

@endsection
