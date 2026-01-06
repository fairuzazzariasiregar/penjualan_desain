@extends('app')

@section('title', 'Daftar Service')
@section('header', 'Daftar Service')

@section('content')

<div class="card">

    {{-- TOP BAR --}}
    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:24px;
        gap:10px;
    ">
        <h3 style="margin:0;">Data Service</h3>

        <div style="display:flex; gap:10px;">

            <a href="{{ route('services.create') }}" class="btn">
                Tambah Service
            </a>
        </div>
    </div>

    {{-- TABLE --}}
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th width="90">Foto</th>
                    <th>Nama Service</th>
                    <th>Deskripsi</th>
                    <th width="150">Harga</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($services as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    {{-- FOTO --}}
<td>
    @if ($s->foto && file_exists(public_path('uploads/services/' . $s->foto)))
        <img src="{{ asset('uploads/services/' . $s->foto) }}"
             alt="{{ $s->nama_service }}"
             style="
                width:60px;
                height:60px;
                object-fit:cover;
                border-radius:10px;
                box-shadow:0 4px 10px rgba(0,0,0,.08);
             ">
    @else
        <div style="
            width:60px;
            height:60px;
            border-radius:10px;
            background:#e5e7eb;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#64748b;
            font-size:12px;
            text-align:center;
        ">
            No Image
        </div>
    @endif
</td>

                    <td>
                        <strong>{{ $s->nama_service }}</strong>
                    </td>

                    <td style="
                        color:#64748b;
                        text-align: justify;
                    ">
                            {{ $s->deskripsi }}
                    </td>

                    <td>
                        <span style="
                            background:#ecfeff;
                            color:#0369a1;
                            padding:6px 12px;
                            border-radius:999px;
                            font-weight:600;
                            font-size:13px;
                        ">
                            Rp {{ number_format($s->harga, 0, ',', '.') }}
                        </span>
                    </td>

                    <td>
                        <div class="aksi">
                            <a href="{{ route('services.edit', $s->id) }}" class="btn-edit">
                                Edit
                            </a>

                            <form
                                action="{{ route('services.destroy', $s->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin hapus service ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" style="
                        text-align:center;
                        padding:30px;
                        color:#94a3b8;
                        font-style:italic;
                    ">
                        Belum ada service
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
