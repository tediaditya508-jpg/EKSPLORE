<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 16px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .header p {
            color: #6b7280;
        }

        .btn-back {
            text-decoration: none;
            background: #111827;
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 14px;
        }

        .btn-read-all {
            display: inline-block;
            margin-top: 18px;
            border: none;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .notification-card {
            background: white;
            padding: 20px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #d1d5db;
        }

        .notification-card.unread {
            border-left-color: #2563eb;
            background: #eff6ff;
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .notification-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .notification-message {
            color: #4b5563;
            line-height: 1.6;
            margin-top: 8px;
        }

        .notification-date {
            color: #9ca3af;
            font-size: 13px;
            white-space: nowrap;
        }

        .badge {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-unread {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-read {
            background: #e5e7eb;
            color: #4b5563;
        }

        .btn-read {
            margin-top: 14px;
            border: none;
            background: #e5e7eb;
            color: #374151;
            padding: 8px 13px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
        }

        .empty {
            background: white;
            padding: 50px 20px;
            text-align: center;
            border-radius: 16px;
            color: #6b7280;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 600px) {
            .header-top,
            .notification-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-back {
                width: 100%;
                text-align: center;
            }

            .notification-date {
                white-space: normal;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div class="header-top">

            <div>
                <h1>Notifikasi</h1>
                <p>Halo, {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }} 👋</p>
            </div>

            <a href="{{ route('dashboard') }}" class="btn-back">
                ← Kembali
            </a>

        </div>

        @if ($notifikasi->where('dibaca', false)->count() > 0)

            <form action="{{ route('notifikasi.bacaSemua') }}" method="POST">
                @csrf
                @method('PATCH')

                <button type="submit" class="btn-read-all">
                    Tandai Semua Sudah Dibaca
                </button>
            </form>

        @endif

    </div>


    <div class="notification-list">

        @forelse ($notifikasi as $item)

            <div class="notification-card {{ !$item->dibaca ? 'unread' : '' }}">

                <div class="notification-header">

                    <div>
                        <div class="notification-title">
                            {{ $item->judul }}
                        </div>

                        @if (!$item->dibaca)
                            <span class="badge badge-unread">
                                Belum Dibaca
                            </span>
                        @else
                            <span class="badge badge-read">
                                Sudah Dibaca
                            </span>
                        @endif
                    </div>

                    <div class="notification-date">
                        {{ $item->created_at?->format('d M Y, H:i') }}
                    </div>

                </div>


                <div class="notification-message">
                    {{ $item->pesan }}
                </div>


                @if (!$item->dibaca)

                    <form action="{{ route('notifikasi.baca', $item->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn-read">
                            Tandai Sudah Dibaca
                        </button>
                    </form>

                @endif

            </div>

        @empty

            <div class="empty">

                <h2>Belum Ada Notifikasi</h2>

                <p style="margin-top: 8px;">
                    Saat ada informasi baru untuk kamu,
                    notifikasi akan muncul di halaman ini.
                </p>

            </div>

        @endforelse

    </div>

</div>

</body>
</html>