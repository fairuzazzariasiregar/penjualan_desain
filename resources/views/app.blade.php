<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi')</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f1f5f9;
            color: #334155;
        }

        header {
            background: linear-gradient(90deg, #1e3a8a, #2563eb);
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 20px;
            font-weight: 600;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 14px;
            border-radius: 8px;
            transition: .2s;
        }

        nav a:hover {
            background: rgba(255,255,255,.2);
        }

        main {
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn:hover { background: #1e40af; }

        .card {
            background: white;
            padding: 26px;
            border-radius: 16px;
            box-shadow: 0 12px 25px rgba(0,0,0,.08);
            margin-bottom: 25px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            display: flex;
            gap: 18px;
            align-items: center;
            padding: 24px;
            border-radius: 18px;
            color: white;
            box-shadow: 0 15px 30px rgba(0,0,0,.12);
            transition: .3s;
        }

        .stat-card:hover {
            transform: translateY(-6px);
        }

        .stat-card h6 {
            font-size: 14px;
            opacity: .9;
            margin-bottom: 4px;
        }

        .stat-card h2 {
            font-size: 32px;
            margin: 0;
        }

        .stat-card span {
            font-size: 13px;
            opacity: .85;
        }

        .icon {
            font-size: 34px;
            background: rgba(255,255,255,.25);
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
        }

        .blue { background: linear-gradient(135deg, #2563eb, #1e40af); }
        .purple { background: linear-gradient(135deg, #7c3aed, #5b21b6); }
        .green { background: linear-gradient(135deg, #16a34a, #166534); }
        .orange { background: linear-gradient(135deg, #f97316, #c2410c); }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #1e3a8a;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f8fafc;
        }

        .status {
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
        }

        .selesai { background: #dcfce7; color: #166534; }
        .pending { background: #fef3c7; color: #92400e; }
        .proses { background: #dbeafe; color: #1e40af; }

.aksi {
    display: flex;
    gap: 8px;
}

.btn-edit {
    background: #2563eb;
    color: white;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 13px;
    text-decoration: none;
}

.btn-edit:hover {
    background: #1e40af;
}

.btn-delete {
    background: #ef4444;
    color: white;
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 13px;
    border: none;
    cursor: pointer;
}

.btn-delete:hover {
    background: #b91c1c;
}
    </style>
</head>
<body>

<header>
    <div class="brand">@yield('header')</div>

    @auth
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('services.index') }}">Services</a>
        <a href="{{ route('orders.index') }}">Orders</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn">Logout</button>
        </form>
    </nav>
    @endauth
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>
