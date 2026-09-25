<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil - EKSPLORE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .header {
            background: #2563eb;
            color: white;
            padding: 25px 30px;
        }

        .header-content {
            max-width: 900px;
            margin: auto;
        }

        .back {
            display: inline-block;
            color: white;
            text-decoration: none;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .header p {
            opacity: 0.9;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .profile-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .profile-top {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 25px;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 25px;
        }

        .avatar-wrapper {
            position: relative;
        }

        .avatar,
        .avatar-image {
            width: 90px;
            height: 90px;
            border-radius: 50%;
        }

        .avatar {
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            font-weight: bold;
            overflow: hidden;
        }

        .avatar-image {
            object-fit: cover;
            display: block;
        }

        .profile-top h2 {
            font-size: 23px;
            margin-bottom: 6px;
        }

        .profile-top p {
            color: #6b7280;
        }

        .photo-actions {
            margin-top: 12px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 9px 14px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-danger {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-danger:hover {
            background: #fecaca;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .info-title {
            font-size: 18px;
            margin-bottom: 18px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .info-item {
            background: #f8fafc;
            border-radius: 10px;
            padding: 16px;
        }

        .label {
            display: block;
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 7px;
        }

        .value {
            font-size: 16px;
            font-weight: 600;
            word-break: break-word;
        }

        .role {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        .edit-section {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .edit-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #2563eb;
        }

        .form-actions {
            grid-column: 1 / -1;
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        #editForm,
        #photoForm {
            display: none;
        }

        .photo-form {
            margin-top: 12px;
        }

        .photo-form input[type="file"] {
            font-size: 13px;
        }

        @media (max-width: 650px) {
            .info-grid,
            .edit-form {
                grid-template-columns: 1fr;
            }

            .profile-card {
                padding: 20px;
            }

            .profile-top {
                align-items: flex-start;
            }

            .form-group.full,
            .form-actions {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="header-content">

            <a href="{{ route('dashboard') }}" class="back">
                ← Kembali ke Beranda
            </a>

            <h1>👤 Profil</h1>
            <p>Informasi akun siswa EKSPLORE</p>

        </div>
    </div>

    <div class="container">

        <div class="profile-card">

            {{-- PESAN BERHASIL --}}
            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- PESAN ERROR --}}
            @if ($errors->any())
                <div class="error">
                    <ul style="padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- BAGIAN FOTO DAN IDENTITAS --}}
            <div class="profile-top">

                <div class="avatar-wrapper">

                    @if ($siswa->foto)
                        <div class="avatar">
                            <img
                                src="{{ asset('storage/' . $siswa->foto) }}"
                                alt="Foto Profil"
                                class="avatar-image"
                            >
                        </div>
                    @else
                        <div class="avatar">
                            {{ strtoupper(substr($siswa->name ?? $siswa->nama ?? 'S', 0, 1)) }}
                        </div>
                    @endif

                </div>

                <div>
                    <h2>
                        {{ $siswa->name ?? $siswa->nama ?? 'Siswa' }}
                    </h2>

                    <p>
                        {{ $siswa->email }}
                    </p>

                    {{-- TOMBOL FOTO --}}
                    <div class="photo-actions">

                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="document.getElementById('photoForm').style.display='block'"
                        >
                            📷 {{ $siswa->foto ? 'Ubah Foto' : 'Tambah Foto' }}
                        </button>

                        @if ($siswa->foto)
                            <form
                                action="{{ route('profile.foto.delete') }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus foto profil?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                >
                                    🗑️ Hapus Foto
                                </button>
                            </form>
                        @endif

                    </div>

                    {{-- FORM FOTO --}}
                    <form
                        id="photoForm"
                        class="photo-form"
                        action="{{ route('profile.foto.update') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <input
                            type="file"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                            required
                        >

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Simpan Foto
                        </button>

                        <button
                            type="button"
                            class="btn btn-secondary"
                            onclick="document.getElementById('photoForm').style.display='none'"
                        >
                            Batal
                        </button>
                    </form>

                </div>

            </div>

            {{-- INFORMASI SISWA --}}
            <h3 class="info-title">
                Informasi Siswa
            </h3>

            <div class="info-grid">

                <div class="info-item">
                    <span class="label">Nama Lengkap</span>
                    <span class="value">
                        {{ $siswa->name ?? $siswa->nama ?? '-' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Email</span>
                    <span class="value">
                        {{ $siswa->email ?? '-' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">NIS</span>
                    <span class="value">
                        {{ $siswa->nis ?? '-' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Kelas</span>
                    <span class="value">
                        {{ $siswa->kelas ?? '-' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">No. HP</span>
                    <span class="value">
                        {{ $siswa->no_hp ?? '-' }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="label">Role</span>
                    <span class="value">
                        <span class="role">
                            {{ ucfirst($siswa->role ?? 'siswa') }}
                        </span>
                    </span>
                </div>

            </div>

            {{-- EDIT BIODATA --}}
            <div class="edit-section">

                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="document.getElementById('editForm').style.display='block'; this.style.display='none'"
                >
                    ✏️ Edit Biodata
                </button>

                <form
                    id="editForm"
                    class="edit-form"
                    action="{{ route('profile.update') }}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    <div class="form-group full">
                        <label for="name">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $siswa->name ?? $siswa->nama) }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="nis">
                            NIS
                        </label>

                        <input
                            type="text"
                            id="nis"
                            name="nis"
                            value="{{ old('nis', $siswa->nis) }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="kelas">
                            Kelas
                        </label>

                        <input
                            type="text"
                            id="kelas"
                            name="kelas"
                            value="{{ old('kelas', $siswa->kelas) }}"
                        >
                    </div>

                    <div class="form-group">
                        <label for="no_hp">
                            No. HP
                        </label>

                        <input
                            type="text"
                            id="no_hp"
                            name="no_hp"
                            value="{{ old('no_hp', $siswa->no_hp) }}"
                        >
                    </div>

                    <div class="form-actions">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            💾 Simpan Perubahan
                        </button>

                        <button
                            type="button"
                            class="btn btn-secondary"
                            onclick="document.getElementById('editForm').style.display='none'"
                        >
                            Batal
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>