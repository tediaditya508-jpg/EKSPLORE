<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ekstrakurikuler;
use App\Models\Pendaftaran;
use App\Models\AnggotaEkskul;
use App\Models\Jadwal;
use App\Models\Absensi;
use App\Models\Prestasi;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function pengguna()
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.pengguna', [
            'admin' => $admin,
            'users' => $users,
        ]);
    }

    public function create()
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil data pembina
        |--------------------------------------------------------------------------
        */

        $pembina = User::where('role', 'pembina')
            ->orderBy('name')
            ->get();

        return view('admin.pengguna-create', [
            'admin' => $admin,
            'pembina' => $pembina,
        ]);
    }

    public function edit($id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $user = User::findOrFail($id);

        return view('admin.pengguna-edit', [
            'admin' => $admin,
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat mengubah pengguna.',
                ]);
        }

        $user = User::findOrFail($id);

        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],

                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:user,email,' . $user->id,
                ],

                'role' => [
                    'required',
                    'in:siswa,pembina,admin',
                ],
            ],
            [
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email tersebut sudah digunakan.',
                'role.required' => 'Role wajib dipilih.',
                'role.in' => 'Role pengguna tidak valid.',
            ]
        );

        $user->update([
            'name' => $data['name'],
            'nama' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
        ]);

        return redirect()
            ->route('admin.pengguna')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat menambahkan pengguna.',
                ]);
        }

        $data = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:user,email',
                ],

                'password' => [
                    'required',
                    'string',
                    Password::min(8)
                        ->letters()
                        ->numbers()
                        ->mixedCase(),
                    'confirmed',
                ],

                'role' => [
                    'required',
                    'in:siswa,pembina,admin',
                ],
            ],
            [
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email tersebut sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'role.required' => 'Role wajib dipilih.',
                'role.in' => 'Role pengguna tidak valid.',
            ]
        );

        User::create([
            'name' => $data['name'],
            'nama' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        return redirect()
            ->route('admin.pengguna')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | KELOLA EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function ekstrakurikuler()
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $ekskul = Ekstrakurikuler::with('pembina')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.ekstrakurikuler', [
            'admin' => $admin,
            'ekskul' => $ekskul,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function createEkstrakurikuler()
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $pembina = User::where('role', 'pembina')
            ->orderBy('name')
            ->get();

        return view('admin.ekstrakurikuler-create', [
            'admin' => $admin,
            'pembina' => $pembina,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function storeEkstrakurikuler(Request $request)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat menambahkan ekstrakurikuler.',
                ]);
        }

        $data = $request->validate(
            [
                'nama_ekskul' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'deskripsi' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'pembina_id' => [
                    'nullable',
                    'exists:user,id',
                ],

                'jadwal' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'jam' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'lokasi' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                // DIUBAH: sekarang menerima file gambar
                'gambar' => [
                    'nullable',
                    'file',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:2048',
                ],

                'kuota' => [
                    'nullable',
                    'integer',
                    'min:1',
                ],

                'persyaratan' => [
                    'nullable',
                    'string',
                    'max:255',
                ],
            ],
            [
                'nama_ekskul.required' => 'Nama ekstrakurikuler wajib diisi.',
                'pembina_id.exists' => 'Pembina yang dipilih tidak ditemukan.',
                'kuota.integer' => 'Kuota harus berupa angka.',
                'kuota.min' => 'Kuota minimal 1.',
                'gambar.image' => 'File gambar harus berupa gambar.',
                'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
            ]
        );

        if (!empty($data['pembina_id'])) {
            $pembina = User::where('id', $data['pembina_id'])
                ->where('role', 'pembina')
                ->first();

            if (!$pembina) {
                return back()
                    ->withErrors([
                        'pembina_id' => 'Pengguna yang dipilih bukan pembina.',
                    ])
                    ->withInput();
            }
        }

        // DIUBAH: simpan file gambar ke storage
        $gambar = null;

        if (!empty($data['gambar'])) {
            $gambar = $data['gambar']->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create([
            'nama_ekskul' => $data['nama_ekskul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'pembina_id' => $data['pembina_id'] ?? null,
            'jadwal' => $data['jadwal'] ?? null,
            'jam' => $data['jam'] ?? null,
            'lokasi' => $data['lokasi'] ?? null,
            'gambar' => $gambar,
            'kuota' => $data['kuota'] ?? null,
            'persyaratan' => $data['persyaratan'] ?? null,
        ]);

        return redirect()
            ->route('admin.ekstrakurikuler')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM EDIT EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function editEkstrakurikuler($id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $pembina = User::where('role', 'pembina')
            ->orderBy('name')
            ->get();

        return view('admin.ekstrakurikuler-edit', [
            'admin' => $admin,
            'ekskul' => $ekskul,
            'pembina' => $pembina,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function updateEkstrakurikuler(Request $request, $id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat mengubah ekstrakurikuler.',
                ]);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $data = $request->validate(
            [
                'nama_ekskul' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'deskripsi' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'pembina_id' => [
                    'nullable',
                    'exists:user,id',
                ],

                'jadwal' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'jam' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'lokasi' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'gambar' => [
                    'nullable',
                    'string',
                    'max:255',
                ],

                'kuota' => [
                    'nullable',
                    'integer',
                    'min:1',
                ],

                'persyaratan' => [
                    'nullable',
                    'string',
                    'max:255',
                ],
            ],
            [
                'nama_ekskul.required' => 'Nama ekstrakurikuler wajib diisi.',
                'pembina_id.exists' => 'Pembina yang dipilih tidak ditemukan.',
                'kuota.integer' => 'Kuota harus berupa angka.',
                'kuota.min' => 'Kuota minimal 1.',
            ]
        );

        if (!empty($data['pembina_id'])) {
            $pembina = User::where('id', $data['pembina_id'])
                ->where('role', 'pembina')
                ->first();

            if (!$pembina) {
                return back()
                    ->withErrors([
                        'pembina_id' => 'Pengguna yang dipilih bukan pembina.',
                    ])
                    ->withInput();
            }
        }

        $ekskul->update([
            'nama_ekskul' => $data['nama_ekskul'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'pembina_id' => $data['pembina_id'] ?? null,
            'jadwal' => $data['jadwal'] ?? null,
            'jam' => $data['jam'] ?? null,
            'lokasi' => $data['lokasi'] ?? null,
            'gambar' => $data['gambar'] ?? null,
            'kuota' => $data['kuota'] ?? null,
            'persyaratan' => $data['persyaratan'] ?? null,
        ]);

        return redirect()
            ->route('admin.ekstrakurikuler')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    public function destroyEkstrakurikuler($id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat menghapus ekstrakurikuler.',
                ]);
        }

        $ekskul = Ekstrakurikuler::findOrFail($id);

        $ekskul->delete();

        return redirect()
            ->route('admin.ekstrakurikuler')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN ADMIN
    |--------------------------------------------------------------------------
    */

    public function laporan()
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Halaman ini hanya dapat diakses oleh admin.',
                ]);
        }

        $totalPengguna = User::count();

        $totalSiswa = User::where('role', 'siswa')->count();

        $totalPembina = User::where('role', 'pembina')->count();

        $totalEkstrakurikuler = Ekstrakurikuler::count();

        $totalPendaftaran = Pendaftaran::count();

        $totalAnggota = AnggotaEkskul::count();

        $totalJadwal = Jadwal::count();

        $totalAbsensi = Absensi::count();

        $totalPrestasi = Prestasi::count();

        $totalPengumuman = Pengumuman::count();

        return view('admin.laporan', [
            'admin' => $admin,

            'totalPengguna' => $totalPengguna,
            'totalSiswa' => $totalSiswa,
            'totalPembina' => $totalPembina,

            'totalEkstrakurikuler' => $totalEkstrakurikuler,
            'totalPendaftaran' => $totalPendaftaran,
            'totalAnggota' => $totalAnggota,

            'totalJadwal' => $totalJadwal,
            'totalAbsensi' => $totalAbsensi,
            'totalPrestasi' => $totalPrestasi,
            'totalPengumuman' => $totalPengumuman,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS PENGGUNA
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $admin = Auth::user();

        if (!$admin || $admin->role !== 'admin') {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'akses' => 'Hanya admin yang dapat menghapus pengguna.',
                ]);
        }

        $user = User::findOrFail($id);

        if ($user->id === $admin->id) {
            return redirect()
                ->route('admin.pengguna')
                ->withErrors([
                    'hapus' => 'Akun admin yang sedang digunakan tidak dapat dihapus.',
                ]);
        }

        $user->delete();

        return redirect()
            ->route('admin.pengguna')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}