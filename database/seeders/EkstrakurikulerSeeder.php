<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        Ekstrakurikuler::create([
            'nama_ekskul' => 'Futsal',
            'deskripsi' => 'Ekstrakurikuler olahraga futsal untuk mengembangkan kemampuan bermain, kerja sama tim, dan sportivitas.',
            'jadwal' => 'Senin',
            'jam' => '15:30 - 17:00',
            'lokasi' => 'Lapangan Sekolah',
            'gambar' => null,
            'kuota' => 30,
            'persyaratan' => 'Siswa aktif SMK Budi Bakti Ciwidey.',
        ]);

        Ekstrakurikuler::create([
            'nama_ekskul' => 'Paskibra',
            'deskripsi' => 'Kegiatan untuk melatih kedisiplinan, kepemimpinan, kekompakan, dan tanggung jawab.',
            'jadwal' => 'Selasa',
            'jam' => '15:30 - 17:00',
            'lokasi' => 'Lapangan Sekolah',
            'gambar' => null,
            'kuota' => 30,
            'persyaratan' => 'Siswa aktif SMK Budi Bakti Ciwidey.',
        ]);

        Ekstrakurikuler::create([
            'nama_ekskul' => 'Coding',
            'deskripsi' => 'Belajar pemrograman, pembuatan website, aplikasi, database, dan teknologi digital.',
            'jadwal' => 'Rabu',
            'jam' => '15:30 - 17:00',
            'lokasi' => 'Lab RPL',
            'gambar' => null,
            'kuota' => 25,
            'persyaratan' => 'Siswa yang tertarik dengan teknologi dan pemrograman.',
        ]);

        Ekstrakurikuler::create([
            'nama_ekskul' => 'PMR',
            'deskripsi' => 'Kegiatan kepalangmerahan, pertolongan pertama, kesehatan, dan kegiatan sosial.',
            'jadwal' => 'Kamis',
            'jam' => '15:30 - 17:00',
            'lokasi' => 'Ruang PMR',
            'gambar' => null,
            'kuota' => 30,
            'persyaratan' => 'Siswa aktif SMK Budi Bakti Ciwidey.',
        ]);

        Ekstrakurikuler::create([
            'nama_ekskul' => 'Pencak Silat',
            'deskripsi' => 'Kegiatan bela diri untuk melatih kemampuan, kedisiplinan, ketahanan, dan sportivitas.',
            'jadwal' => 'Jumat',
            'jam' => '15:30 - 17:00',
            'lokasi' => 'Aula Sekolah',
            'gambar' => null,
            'kuota' => 25,
            'persyaratan' => 'Siswa aktif SMK Budi Bakti Ciwidey.',
        ]);

        Ekstrakurikuler::create([
            'nama_ekskul' => 'Seni',
            'deskripsi' => 'Wadah untuk mengembangkan kreativitas siswa dalam bidang seni dan pertunjukan.',
            'jadwal' => 'Sabtu',
            'jam' => '09:00 - 11:00',
            'lokasi' => 'Aula Sekolah',
            'gambar' => null,
            'kuota' => 25,
            'persyaratan' => 'Siswa yang memiliki minat di bidang seni.',
        ]);
    }
}