
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Terbatas | EKSPLORE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f5f8ff;
            color: #172554;
        }

        .wrapper {
            width: 100%;
            max-width: 650px;
            padding: 55px 45px;
            text-align: center;
            background: white;
            border: 1px solid #e8eef8;
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(30, 64, 175, .08);
        }

        .illustration {
            width: 145px;
            height: 145px;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 45px;
            background: linear-gradient(145deg, #eff6ff, #dbeafe);
        }

        .illustration svg {
            width: 82px;
            height: 82px;
            fill: none;
            stroke: #2563eb;
            stroke-width: 1.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .eyebrow {
            color: #2563eb;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            margin-top: 15px;
            font-size: clamp(27px, 5vw, 36px);
            line-height: 1.25;
            font-weight: 800;
        }

        .description {
            max-width: 440px;
            margin: 16px auto 0;
            color: #64748b;
            font-size: 15px;
            line-height: 1.8;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 32px;
            padding: 15px 25px;
            border-radius: 12px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: .25s;
        }

        .button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(37, 99, 235, .2);
        }

        .button svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .footer {
            margin-top: 38px;
            padding-top: 22px;
            border-top: 1px solid #edf1f7;
            color: #94a3b8;
            font-size: 12px;
        }

        .footer strong {
            color: #2563eb;
            letter-spacing: 1px;
        }

        @media (max-width: 480px) {
            .wrapper {
                padding: 40px 23px;
                border-radius: 22px;
            }

            .illustration {
                width: 115px;
                height: 115px;
                border-radius: 35px;
            }

            .illustration svg {
                width: 65px;
                height: 65px;
            }
        }
    </style>
</head>

<body>
    <main class="wrapper">

        <div class="illustration">
            <svg viewBox="0 0 80 80">
                <rect x="17" y="34" width="46" height="34" rx="8"/>
                <path d="M27 34V23a13 13 0 0 1 26 0v11"/>
                <circle cx="40" cy="49" r="4"/>
                <path d="M40 53v6"/>
                <path d="M12 16l-5-5M68 16l5-5M40 5V1"/>
            </svg>
        </div>

        <div class="eyebrow">Halaman Terbatas</div>

        <h1>Oops! Sepertinya Kamu Tersesat</h1>

        <p class="description">
            Sepertinya akun kamu belum memiliki izin untuk
            membuka halaman ini. Jangan khawatir, kamu masih
            bisa menjelajahi fitur EKSPLORE lainnya sesuai
            dengan hak akses akunmu.
        </p>

        <a href="{{ url('/dashboard') }}" class="button">
            <svg viewBox="0 0 24 24">
                <path d="m3 10 9-7 9 7"/>
                <path d="M5 9v12h14V9"/>
                <path d="M9 21v-7h6v7"/>
            </svg>
            Kembali ke Dashboard
        </a>

        <div class="footer">
            <strong>EKSPLORE</strong>
            <p style="margin-top: 7px;">Sistem Ekstrakurikuler</p>
        </div>

    </main>
</body>
</html>