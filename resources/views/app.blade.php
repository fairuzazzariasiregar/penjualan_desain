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

        /* ===== Layout ===== */
        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* ===== Sidebar ===== */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #0f172a, #1e293b);
            color: white;
            padding: 20px;
            transition: 0.3s;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .brand {
            font-size: 20px;
            font-weight: 600;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            margin-bottom: 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            text-decoration: none;
            color: #cbd5f5;
            border-radius: 10px;
            font-weight: 500;
            transition: .2s;
        }

        .menu a:hover {
            background: rgba(255,255,255,.15);
            color: white;
        }

        /* ===== Main Content ===== */
        .main-content {
            flex: 1;
            padding: 25px 30px;
        }

        .topbar {
            background: linear-gradient(90deg, #1e3a8a, #2563eb);
            color: white;
            padding: 16px 24px;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            box-shadow: 0 10px 22px rgba(0,0,0,.12);
        }

        .topbar h1 {
            font-size: 20px;
            margin: 0;
        }

        /* ===== Button ===== */
        .btn {
            background: #2563eb;
            color: white;
            padding: 8px 16px;
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

        /* ===== Card ===== */
        .card {
            background: white;
            padding: 26px;
            border-radius: 16px;
            box-shadow: 0 12px 25px rgba(0,0,0,.08);
            margin-bottom: 25px;
        }

        /* ===== Stats ===== */
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

        /* ===== Table ===== */
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

<div class="app-container">

    <!-- ===== SIDEBAR ===== -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="brand">Admin Panel</div>
            <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        </div>

        @auth
        <ul class="menu">
            <li><a href="{{ route('dashboard') }}">📊 Dashboard</a></li>
            <li><a href="{{ route('services.index') }}">🛠 Services</a></li>
            <li><a href="{{ route('orders.index') }}">🛒 Orders</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn" style="width:100%; justify-content:center;">Logout</button>
                </form>
            </li>
        </ul>
        @endauth
    </aside>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="main-content">
        <div class="topbar">
            <h1>@yield('header')</h1>
        </div>

        @yield('content')
    </main>

</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('collapsed');
}
</script>

</body>
</html>
