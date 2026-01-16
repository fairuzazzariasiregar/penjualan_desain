@extends('app')

@section('title', 'Daftar Pesanan')
@section('header', 'Daftar Pesanan')

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
        <h3 style="margin:0;">Data Pesanan</h3>

        <div style="display:flex; gap:10px;">

        <a href="{{ route('orders.laporan') }}" class="btn">
            Laporan
        </a>

        <a href="{{ route('orders.create') }}" class="btn">
            Pesan Jasa
        </a>
    </div>
    </div>

    {{-- TABLE --}}
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Customer</th>
                    <th>Service</th>
                    <th width="120">Tanggal</th>
                    <th width="120">Status</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $order->customer_name ?? '-' }}</strong>
                    </td>

                    <td style="color:#334155;">
                        {{ $order->service->nama_service }}
                    </td>

                    <td style="color:#64748b;">
                        {{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d-m-Y') }}
                    </td>

                    <td>
                        @if ($order->status == 'pending')
                            <span class="status status-warning">Pending</span>
                        @elseif ($order->status == 'proses')
                            <span class="status status-info">Proses</span>
                        @else
                            <span class="status status-success">Selesai</span>
                        @endif
                    </td>

                    <td style="text-align:center; width:220px;">
                        <div style="
                            display:flex;
                            justify-content:center;
                            align-items:center;
                            gap:5px;
                            flex-wrap:nowrap;
                        ">

                            <a href="{{ route('orders.resi', $order->id) }}"
                            style="
                                    background:#2563eb;
                                    color:white;
                                    padding:6px 14px;
                                    border-radius:999px;
                                    text-decoration:none;
                                    font-size:13px;
                            ">
                                Resi
                            </a>

                            <a href="{{ route('orders.edit', $order->id) }}"
                            style="
                                    background:#2563eb;
                                    color:white;
                                    padding:6px 14px;
                                    border-radius:999px;
                                    text-decoration:none;
                                    font-size:13px;
                            ">
                                Edit
                            </a>

                            <form
                                action="{{ route('orders.destroy', $order->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin hapus pesanan ini?')"
                                style="margin:0;"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    style="
                                        background:#ef4444;
                                        color:white;
                                        padding:6px 14px;
                                        border:none;
                                        border-radius:999px;
                                        font-size:13px;
                                        cursor:pointer;
                                    ">
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
                        Belum ada pesanan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
