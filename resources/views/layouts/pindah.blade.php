<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pindah Ekskul - EKSPLORE')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #eff6ff;
            --background: #f5f7fb;
            --white: #ffffff;
            --text: #111827;
            --text-secondary: #6b7280;
            --border: #e5e7eb;
            --success: #16a34a;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--white);
            border-right: 1px solid var(--border);
            padding: 25px 18px;
            z-index: 100;
        }

        .brand {
            text-align: center;
            margin-bottom: 35px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: white;
            border-radius: 13px;
            font-size: 25px;
            font-weight: bold;
        }

        .brand h1 {
            font-size: 20px;
            letter-spacing: 1px;
        }

        .brand p {
            color: var(--text-secondary);
            font-size: 12px;
            margin-top: 5px;
        }

        .menu-title {
            color: var(--text-secondary);
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 20px 0 10px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a,
        .menu button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 14px;
            border: none;
            border-radius: 10px;
            background: transparent;
            color: var(--text-secondary);
            font-size: 14px;
            text-align: left;
            cursor: pointer;
        }

        .menu a:hover,
        .menu a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .menu-icon {
            width: 22px;
            text-align: center;
        }

        .menu button.logout {
            color: #dc2626;
        }

        .main {
            margin-left: 0;
            padding: 30px;
            min-height: 100vh;
        }

        .topbar {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    gap: 15px;
    margin-bottom: 28px;
    width: 100%;
}

.welcome {
    text-align: center;
    width: 100%;
}

        .welcome h2 {
            font-size: 23px;
            margin-bottom: 7px;
        }

        .welcome p {
            color: var(--text-secondary);
            font-size: 14px;
        }

        .content-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 24px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .03);
        }

        .content-card h3 {
            margin-bottom: 15px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 15px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 9px;
            background: var(--primary);
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .btn:hover {
            background: var(--primary-dark);
        }

        .btn-danger {
            background: #dc2626;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 13px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #f8fafc;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font: inherit;
            margin-top: 6px;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .form-group {
            margin-bottom: 18px;
        }

        @media (max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                margin-bottom: 15px;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .content-card {
                padding: 16px;
            }
        }

        /* ==============================
           STYLE HALAMAN PINDAH EKSKUL
        ============================== */

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .py-4 {
            padding-top: 24px;
            padding-bottom: 24px;
        }

        .mb-4 {
            margin-bottom: 24px;
        }

        .mb-3 {
            margin-bottom: 16px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .mb-1 {
            margin-bottom: 5px;
        }

        .mt-1 {
            margin-top: 5px;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .gap-2 {
            gap: 10px;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: var(--text-secondary);
        }

        .text-dark {
            color: #111827;
        }

        .fw-bold {
            font-weight: 700;
        }

        .border {
            border: 1px solid var(--border);
        }

        .border-0 {
            border: none;
        }

        .rounded-3 {
            border-radius: 12px;
        }

        .p-3 {
            padding: 18px;
        }

        .py-5 {
            padding-top: 45px;
            padding-bottom: 45px;
        }

        .p-4 {
            padding: 24px;
        }

        .shadow-sm {
            box-shadow: 0 3px 12px rgba(0, 0, 0, .05);
        }

        .card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
        }

        .card-body {
            padding: 24px;
        }

        h2 {
            font-size: 24px;
        }

        h5 {
            font-size: 17px;
        }

        p {
            line-height: 1.6;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-success {
            background: #16a34a;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-warning {
            background: #facc15;
            color: #713f12;
        }

        .badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .bg-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .bg-success {
            background: #dcfce7;
            color: #166534;
        }

        .bg-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        @media (max-width: 700px) {
            .container {
                padding-left: 0;
                padding-right: 0;
            }

            .d-flex.justify-content-between {
                align-items: flex-start;
            }

            .card-body {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

    <main class="main">
        <div class="topbar">
            <div class="welcome">
                <h2>@yield('heading', 'Pindah Ekstrakurikuler')</h2>
                <p>Kelola pengajuan perpindahan ekstrakurikuler kamu.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>