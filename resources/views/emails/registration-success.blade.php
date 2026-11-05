<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran EKSPLORE Berhasil</title>
</head>
<body>
    <h2>Selamat, {{ $user->name }}!</h2>

    <p>Pendaftaran akun EKSPLORE kamu berhasil.</p>

    <p>Email: {{ $user->email }}</p>

    <p>Sekarang kamu sudah bisa login menggunakan email dan password EKSPLORE.</p>

    <p>Terima kasih telah bergabung dengan EKSPLORE.</p>
</body>
</html>