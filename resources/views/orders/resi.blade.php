<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Resi Pesanan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
        }

        .resi {
            width: 380px;
            background: #fff;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
        }

        .resi h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .divider {
            border-top: 1px dashed #cbd5e1;
            margin: 12px 0;
        }

        .row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .row strong {
            color: #0f172a;
        }

        .total {
            font-weight: bold;
            font-size: 15px;
        }

        .footer {
            text-align: center;
            font-size: 13px;
            margin-top: 15px;
            color: #64748b;
        }

        .btn-print {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            border: none;
            background: #2563eb;
            color: white;
            border-radius: 8px;
            cursor: pointer;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="resi">

    <h2>RESI PESANAN</h2>
    <div style="text-align:center; font-size:13px;">
        No Resi: <strong>{{ $order->no_resi }}</strong>
    </div>

    <div class="divider"></div>

    <div class="row">
        <span>Nama</span>
        <span>{{ $order->customer_name }}</span>
    </div>

    <div class="row">
        <span>Tanggal</span>
        <span>{{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d-m-Y') }}</span>
    </div>

    <div class="divider"></div>

    <div class="row">
        <span>Jasa</span>
        <span>{{ $order->service->nama_service }}</span>
    </div>

    <div class="row">
        <span>Harga</span>
        <span>Rp {{ number_format($order->service->harga,0,',','.') }}</span>
    </div>

    <div class="divider"></div>

    <div class="row total">
        <span>Status</span>
        <span>{{ strtoupper($order->status) }}</span>
    </div>

    <div class="divider"></div>

    <div class="footer">
        Terima kasih telah menggunakan jasa kami 🙏
    </div>

    <button onclick="window.print()" class="btn-print">
        Cetak Resi
    </button>

</div>

</body>
</html>
