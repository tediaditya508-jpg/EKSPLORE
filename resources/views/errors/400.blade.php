<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Tidak Valid - EKSPLORE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            text-align: center;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 5px 25px rgba(0,0,0,.08);
        }
        h1 { color: #dc2626; }
        p { color: #475569; line-height: 1.6; }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 11px 20px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>400</h1>
        <h2>Permintaan Tidak Valid</h2>
        <p>{{ $message ?? 'Permintaan tidak dapat diproses.' }}</p>
        <a href="{{ route('register') }}">Kembali ke Pendaftaran</a>
    </div>
</body>
</html>