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
    background: linear-gradient(180deg, #1e3a8a, #2563eb); /* BIRU */
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
    color: #e0e7ff; /* font lebih terang */
    border-radius: 10px;
    font-weight: 500;
    transition: .2s;
}

.menu a:hover {
    background: rgba(255,255,255,.2);
    color: white;
}

/* ===== Sidebar Collapsed Fix ===== */
.sidebar.collapsed .brand {
    display: none;
}

.sidebar.collapsed .menu a span {
    display: none;
}

.sidebar.collapsed .menu a {
    justify-content: center;
    padding: 12px 0;
}

.sidebar.collapsed .btn {
    padding: 10px;
    font-size: 0;
}

.sidebar.collapsed .btn::after {
    content: "⏻";
    font-size: 16px;
}

        /* ===== Main Content ===== */
        .main-content {
            flex: 1;
            padding: 25px 30px;
            background: #f1f5f9;
}

        .content-wrapper {
            max-width: 1100px;
            margin: 0 auto;
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

            max-width: 100%;
            overflow-x: auto;
}


        /* ===== Stats ===== */
.stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 25px;
}

.stat-card {
    background: #ffffff;
    color: #1e293b;
    border-radius: 14px;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    transition: 0.2s;
}

.stat-card:hover {
    transform: translateY(-3px);
}

.stat-card h6 {
    font-size: 12px;
    color: #64748b;
    margin: 0;
}

.stat-card h2 {
    font-size: 22px;
    margin: 4px 0;
    color: #0f172a;
}

.stat-card span {
    font-size: 12px;
    color: #94a3b8;
}

.icon {
    font-size: 26px;
    background: #e0e7ff;
    color: #1e40af;
    width: 50px;
    height: 50px;
    border-radius: 12px;
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
        <li><a href="{{ route('dashboard') }}">📊 <span>Dashboard</span></a></li>
        <li><a href="{{ route('services.index') }}">🛠 <span>Services</span></a></li>
        <li><a href="{{ route('orders.index') }}">🛒 <span>Orders</span></a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn" style="width:100%; justify-content:center;">Logout</button>
            </form>
        </li>
    </ul>
    @endauth
</aside>

        <main class="main-content">
        <div class="content-wrapper">

            <div class="topbar">
                <h1>@yield('header')</h1>
            </div>

            @yield('content')

        </div>
    </main>

</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('collapsed');
}
</script>

</body>
</html>
