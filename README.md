# EKSPLORE

EKSPLORE adalah aplikasi sistem informasi pengelolaan ekstrakurikuler untuk **SMK Budi Bakti Ciwidey**. Aplikasi ini membantu siswa, pembina, dan admin sekolah mengelola kegiatan ekstrakurikuler melalui satu aplikasi web.

## Fitur

- **Siswa:** login ke aplikasi, melihat daftar ekstrakurikuler, melakukan pendaftaran, melihat jadwal kegiatan, mengajukan perpindahan ekstrakurikuler, melihat kehadiran, prestasi, galeri, pengumuman, dan notifikasi, serta mengelola profil pribadi.
- **Pembina:** mengelola kegiatan ekstrakurikuler yang dibina, melihat data anggota, mengelola pendaftaran siswa, mencatat kehadiran, mengelola prestasi, galeri, jadwal, pengumuman, serta memproses pengajuan perpindahan ekstrakurikuler sesuai kewenangannya.
- **Admin:** mengelola data ekstrakurikuler, pengguna, anggota, pendaftaran, jadwal, kehadiran, prestasi, galeri, pengumuman, pengajuan perpindahan ekstrakurikuler, serta laporan dan data siswa.
- **Manajemen akun dan akses:** autentikasi pengguna, pembatasan akses berdasarkan peran, serta pengelolaan fitur sesuai hak akses Siswa, Pembina, dan Admin.

## Teknologi

- Laravel 12 sebagai framework backend
- PHP sebagai bahasa pemrograman backend
- Blade, HTML, CSS, dan JavaScript untuk antarmuka aplikasi
- Database PostgreSQL/MySQL sesuai konfigurasi proyek
- Composer untuk mengelola dependensi PHP
- Node.js dan npm untuk kebutuhan aset frontend

## Struktur Aplikasi

Project EKSPLORE menggunakan Laravel dengan struktur utama sebagai berikut:

- `app/` — berisi controller, model, middleware, dan logika aplikasi.
- `resources/views/` — berisi halaman antarmuka aplikasi menggunakan Blade.
- `routes/` — berisi pengaturan rute aplikasi.
- `database/` — berisi migration dan pengaturan database.
- `public/` — berisi aset publik aplikasi.
- `storage/` — digunakan untuk penyimpanan file dan log aplikasi.

## Persiapan

Sebelum menjalankan aplikasi, pastikan perangkat sudah memiliki:

- PHP dengan versi yang sesuai dengan kebutuhan Laravel.
- Composer.
- Node.js dan npm.
- Database yang digunakan oleh konfigurasi proyek.
- Git untuk mengelola source code proyek.

## Menjalankan Aplikasi Secara Lokal

1. Masuk ke direktori project EKSPLORE:

   ```bash
   cd EKSPLORE
   ```

2. Pasang dependensi PHP:

   ```bash
   composer install
   ```

3. Pasang dependensi frontend:

   ```bash
   npm install
   ```

4. Siapkan file `.env` berdasarkan konfigurasi proyek, kemudian sesuaikan pengaturan database, seperti nama database, username, password, dan koneksi database.

5. Jalankan migration apabila database belum memiliki struktur tabel yang diperlukan dan migration proyek memang sudah siap digunakan:

   ```bash
   php artisan migrate
   ```

6. Jalankan server pengembangan Laravel:

   ```bash
   php artisan serve
   ```

7. Jika aset frontend perlu dijalankan melalui Vite, buka terminal lain dan jalankan:

   ```bash
   npm run dev
   ```

8. Buka aplikasi melalui alamat:

   ```text
   http://127.0.0.1:8000
   ```

## Perintah Aplikasi

Jalankan perintah berikut dari direktori utama project EKSPLORE:

| Perintah | Keterangan |
|---|---|
| `composer install` | Memasang dependensi PHP |
| `npm install` | Memasang dependensi frontend |
| `php artisan serve` | Menjalankan server pengembangan Laravel |
| `npm run dev` | Menjalankan Vite untuk kebutuhan frontend |
| `npm run build` | Membuat hasil build aset frontend |
| `php artisan route:list` | Melihat daftar rute aplikasi |
| `php artisan test` | Menjalankan pengujian otomatis aplikasi |

## Alur Penggunaan Aplikasi

1. Pengguna membuka aplikasi EKSPLORE dan melakukan login sesuai akun serta perannya.
2. Setelah berhasil login, pengguna diarahkan ke dashboard sesuai hak aksesnya.
3. Siswa dapat melihat informasi ekstrakurikuler dan melakukan pendaftaran.
4. Pembina mengelola kegiatan serta anggota ekstrakurikuler yang menjadi tanggung jawabnya.
5. Pembina mencatat kehadiran dan mengelola informasi kegiatan sesuai kewenangannya.
6. Admin mengelola data utama dan memantau aktivitas pengelolaan ekstrakurikuler.
7. Setiap pengguna mengakses menu dan fitur sesuai peran masing-masing.

## Catatan Konfigurasi

- Akun pengguna dan informasi peran harus tersedia di database agar pengguna dapat masuk ke aplikasi.
- Hak akses aplikasi dibedakan berdasarkan peran Siswa, Pembina, dan Admin.
- Konfigurasi database mengikuti pengaturan pada file `.env`.
- File `.env` berisi konfigurasi penting aplikasi dan tidak boleh dibagikan atau diunggah ke repository publik.
- Sebelum menjalankan migration pada database yang sudah berisi data, lakukan pencadangan terlebih dahulu.
- Aplikasi dijalankan secara lokal selama proses pengembangan menggunakan Laravel development server.

---

**EKSPLORE — Sistem Informasi Pengelolaan Ekstrakurikuler SMK Budi Bakti Ciwidey.**