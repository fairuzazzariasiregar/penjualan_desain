@extends('app')

@section('title', 'Tambah Service')
@section('header', 'Tambah Service')

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
    }

    .form-control:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,.15);
    }

    textarea.form-control {
        resize: none;
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
    <h3>Tambah Service Baru</h3>
    <p>Tambahkan jenis jasa desain yang tersedia</p>

    {{-- FORM --}}
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- NAMA SERVICE --}}
        <div class="form-group">
            <label>Nama Service</label>
            <input
                type="text"
                name="nama_service"
                class="form-control"
                required
            >
        </div>

        {{-- DESKRIPSI --}}
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea
                name="deskripsi"
                class="form-control"
                rows="4"
            ></textarea>
        </div>

        {{-- HARGA --}}
        <div class="form-group">
            <label>Harga</label>
            <input
                type="number"
                name="harga"
                class="form-control"
                required
            >
        </div>

        {{-- FOTO SERVICE --}}
        <div class="form-group">
            <label>Foto Service</label>
            <input
                type="file"
                name="foto"
                class="form-control"
                accept="image/*"
            >
        </div>

        {{-- ACTION --}}
        <div class="form-actions">
            <a href="{{ route('services.index') }}" class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn-primary">
                Simpan
            </button>
        </div>

    </form>

</div>

@endsection
