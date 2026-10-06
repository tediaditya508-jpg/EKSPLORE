<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password EKSPLORE</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f6f8;">
        <tr>
            <td align="center" style="padding:40px 15px;">

                <table width="600" cellpadding="0" cellspacing="0" border="0"
                    style="max-width:600px; width:100%; background-color:#ffffff; border-radius:14px;">

                    <!-- HEADER -->
                    <tr>
                        <td align="center" style="padding:30px;">

                            <div style="font-size:28px; font-weight:bold; color:#2563eb;">
                                EKSPLORE
                            </div>

                            <div style="margin-top:8px; color:#666666; font-size:14px;">
                                SMK Budi Bakti Ciwidey
                            </div>

                            <h1 style="margin:20px 0 0; color:#222222; font-size:24px;">
                                Reset Password
                            </h1>

                        </td>
                    </tr>

                    <!-- CONTENT -->
                    <tr>
                        <td style="padding:0 30px 30px; color:#333333;">

                            <p style="font-size:16px; line-height:1.6;">
                                Halo,
                                <strong>{{ $user->name ?? $user->nama ?? 'Siswa' }}</strong>.
                            </p>

                            <p style="font-size:15px; line-height:1.7;">
                                Kami menerima permintaan untuk mengatur ulang
                                password akun EKSPLORE kamu.
                            </p>

                            <p style="font-size:15px; line-height:1.7;">
                                Klik tombol di bawah untuk membuat password baru.
                            </p>

                            <div style="text-align:center; margin:30px 0;">

                                <a
                                    href="{{ $resetUrl }}"
                                    style="display:inline-block; padding:13px 24px; background-color:#2563eb; color:#ffffff; text-decoration:none; border-radius:8px; font-size:15px; font-weight:bold;"
                                >
                                    Reset Password
                                </a>

                            </div>

                            <p style="font-size:14px; line-height:1.6; color:#666666;">
                                Link reset password ini hanya berlaku selama
                                <strong>60 menit</strong>.
                            </p>

                            <p style="font-size:14px; line-height:1.6; color:#666666;">
                                Jika kamu tidak meminta reset password,
                                abaikan email ini.
                            </p>

                            <p style="font-size:13px; line-height:1.6; color:#888888; margin-top:25px;">
                                Jika tombol di atas tidak bisa diklik,
                                gunakan link berikut:
                            </p>

                            <p style="font-size:12px; line-height:1.6; word-break:break-all; color:#555555;">
                                {{ $resetUrl }}
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td align="center"
                            style="padding:20px; background-color:#f8f9fa; color:#888888; font-size:12px;">

                            © {{ date('Y') }} EKSPLORE — SMK Budi Bakti Ciwidey

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>