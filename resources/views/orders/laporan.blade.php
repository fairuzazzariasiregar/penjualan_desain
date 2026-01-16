<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .info {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            padding: 10px;
            font-size: 14px;
        }

        th {
            background: #eee;
            text-align: center;
        }

        td {
            vertical-align: top;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .btn-print {
            margin-top: 20px;
            padding: 10px 15px;
            cursor: pointer;
        }

        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
            </head>
            <body>

            <h2>LAPORAN PENJUALAN JASA</h2>
            <div class="info">
                Total Pesanan: <b>{{ $orders->count() }}</b>
            </div>

            <table>
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Nama Jasa</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>

    @foreach($orders as $o)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $o->customer_name ?? '-' }}</td>
                    <td>{{ $o->service->nama_service ?? '-' }}</td>
                    <td class="text-right">
                        Rp {{ number_format($o->service->harga ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}
                    </td>
                    <td class="text-center">
                        {{ ucfirst($o->status) }}
                    </td>
                </tr>
    @endforeach
</table>
<button class="btn-print" onclick="window.print()">Cetak Laporan</button>
</body>
</html>
