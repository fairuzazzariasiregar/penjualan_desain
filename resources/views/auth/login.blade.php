<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Penjualan Jasa Desain</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: white;
            width: 360px;
            padding: 35px 30px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,.15);
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 8px;
            color: #1e3a8a;
        }

        .login-card p {
            text-align: center;
            font-size: 14px;
            color: #64748b;
            margin-bottom: 25px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 11px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            margin-bottom: 16px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        button {
            width: 100%;
            background: #2563eb;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #1e40af;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 15px;
            text-align: center;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Login</h2>
    <p>Penjualan Jasa Desain</p>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Masuk</button>
    </form>

    <div class="footer">
        © {{ date('Y') }} Penjualan Jasa Desain
    </div>
</div>

</body>
</html>
