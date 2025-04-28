<?php

namespace App\Http\Controllers\admin\anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Support\Facades\Storage;

// models
use App\Models\User;
use App\Models\Anggota;
use App\Models\Kampus;
use App\Models\Fakultas;
use App\Models\ProgramStudi;

class AnggotaController extends Controller
{

    // index
    // menampilkan halaman data anggota
    public function index()
    {
        // Ambil parameter pencarian
        $search = request()->search;

        // Mulai query dari Anggota dan relasi programstudi
        $query = Anggota::with('programstudi');
        
        // Jika ada pencarian, filter berdasarkan nama_lengkap
        if ($search) {
            $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        }
        
        $statusMap = [
            'draft' => 'Draft',
            'baru' => 'Baru',
            'pindahkeluar' => 'Pindah Keluar',
            'pindahmasuk' => 'Pindah Masuk',
            'alumni' => 'Alumni',
        ];
        
        $descriptionMap = [
            'draft' => 'Menampilkan semua data anggota yang masih draft.',
            'baru' => 'Menampilkan semua data anggota baru.',
            'pindahkeluar' => 'Menampilkan data anggota yang telah pindah keluar.',
            'pindahmasuk' => 'Menampilkan data anggota yang pindah masuk.',
            'alumni' => 'Menampilkan data anggota yang sudah menjadi alumni.',
        ];
        
        $segment = request()->segment(3);
        
        // Default values
        $pageTitle = 'Anggota';
        $pageDescription = 'Menampilkan semua data anggota.';
        
        // Set jika segment cocok
        if (isset($statusMap[$segment])) {
            $pageTitle = 'Anggota ' . $statusMap[$segment];
            $pageDescription = $descriptionMap[$segment] ?? $pageDescription;
            
            $query->where('status', $statusMap[$segment]);
        }
        

        // Urutkan berdasarkan nama_lengkap ascending dan paginasi
        $datas = $query->orderBy('nama_lengkap', 'asc')->paginate(10);

        // dd($datas);

        

        return view('admin.anggota.index', compact(
            'pageTitle',
            'pageDescription',
            'datas',
        ))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    // script ajax saat memilih kampus, fakultas, dan program studi
    public function getFakultas($kampus_id)
    {
        $fakultas = Fakultas::where('kampus_id', $kampus_id)->get();
        return response()->json($fakultas);
    }

    public function getProgramStudi($fakultas_id)
    {
        $programStudi = ProgramStudi::where('fakultas_id', $fakultas_id)->get();
        return response()->json($programStudi);
    }

    // create
    // menampilkan form tambah data
    public function create()
    {

        $kampus = Kampus::all();
        $fakultas = Fakultas::all();
        $programstudi = ProgramStudi::all();

        $pageTitle = 'Anggota Baru';
        $pageDescription = 'Menampilkan semua data anggota baru.';

        return view('admin.anggota.form', compact(
            'pageTitle',
            'pageDescription',
            'kampus',
            'fakultas',
            'programstudi',
        ));
    }

    // store
    // proses mengirimkan data ke dalam database
    public function store(Request $request)
    {
        // Validasi NIM unik
        $request->validate([
            'nim' => 'unique:anggotas,nim',
        ], [
            'nim.unique' => 'NIM sudah digunakan.',
        ]);

        // Ambil nama program studi dari ID
        $programStudi = ProgramStudi::find($request->program_studi_id);
        $programStudiNama = $programStudi ? $programStudi->nama_program_studi : null;

        // Inisialisasi array data
        $data = [
            'program_studi_id'    => $request->program_studi_id,
            'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
            'nama_lengkap'        => $request->nama_lengkap,
            'jenis_kelamin'       => $request->jenis_kelamin,
            'tempat_lahir'        => $request->tempat_lahir,
            'tanggal_lahir'       => $request->tanggal_lahir,
            'agama'               => $request->agama,
            'alamat_tinggal'      => $request->alamat_tinggal,
            'no_hp'               => $request->no_hp,
            'email'               => $request->email,
            'nim'                 => $request->nim,
            'status'              => $request->status ?? 'Draft',
            'alumni'              => $request->alumni,
            'keterangan'          => $request->keterangan,
        ];

        if ($request->hasFile('kpm')) {
            $data['kpm'] = $request->file('kpm')->store('uploads/kpm', 'public');
        }

        if ($request->hasFile('ktp')) {
            $data['ktp'] = $request->file('ktp')->store('uploads/ktp', 'public');
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('uploads/foto', 'public');
        }

        Anggota::create($data);

        return redirect()->route('admin.anggota')->with('success', 'Data anggota berhasil disimpan.');
    }

    // show
    // menampilkan halaman detail
    public function show($id)
    {

        $kampus = Kampus::all();
        $fakultas = Fakultas::all();
        $programstudi = ProgramStudi::all();

        // $data = Anggota::findOrFail($id);
        $data = Anggota::with('programstudi.fakultas.kampus')->findOrFail($id);

        // dd($data->programStudi);

        $pageTitle = 'Anggota Baru';
        $pageDescription = 'Menampilkan semua data anggota baru.';

        return view('admin.anggota.detail', compact(
            'pageTitle',
            'pageDescription',
            'kampus',
            'fakultas',
            'programstudi',
            'data'
        ));
    }

    // edit
    // menampilkan form ubah data
    public function edit($id)
    {

        $kampus = Kampus::all();
        $fakultas = Fakultas::all();
        $programstudi = ProgramStudi::all();

        // $data = Anggota::findOrFail($id);
        $data = Anggota::with('programstudi.fakultas.kampus')->findOrFail($id);

        // dd($data->programStudi);

        $pageTitle = 'Anggota Baru';
        $pageDescription = 'Menampilkan semua data anggota baru.';

        return view('admin.anggota.form', compact(
            'pageTitle',
            'pageDescription',
            'kampus',
            'fakultas',
            'programstudi',
            'data'
        ));
    }

    // update
    // proses ubah simpan data yang dirubah ke database
    
    public function update(Request $request, $id)
    {
        // Ambil data anggota berdasarkan ID
        $anggota = Anggota::findOrFail($id);

        // Validasi NIM dan Email harus unik, kecuali untuk ID yang sedang diedit
        $request->validate([
            'nim'   => 'required|unique:anggotas,nim,' . $id . ',id',
            'email' => 'required|email|unique:anggotas,email,' . $id . ',id',
        ], [
            'nim.required'   => 'NIM wajib diisi.',
            'nim.unique'     => 'NIM sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.unique'   => 'Email sudah digunakan.',
        ]);

        // Ambil nama program studi dari ID
        $programStudi = ProgramStudi::find($request->program_studi_id);
        $programStudiNama = $programStudi ? $programStudi->nama_program_studi : null;

        // Inisialisasi array data yang akan diupdate
        $data = [
            'program_studi_id'    => $request->program_studi_id,
            'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
            'nama_lengkap'        => $request->nama_lengkap,
            'jenis_kelamin'       => $request->jenis_kelamin,
            'tempat_lahir'        => $request->tempat_lahir,
            'tanggal_lahir'       => $request->tanggal_lahir,
            'agama'               => $request->agama,
            'alamat_tinggal'      => $request->alamat_tinggal,
            'no_hp'               => $request->no_hp,
            'email'               => $request->email,
            'nim'                 => $request->nim,
            'status'              => $request->status,
            'alumni'              => $request->alumni,
            'keterangan'          => $request->keterangan,
        ];

        // Cek dan simpan file jika diupload
        if ($request->hasFile('kpm')) {
            // Simpan file baru dan hapus file lama jika ada
            if ($anggota->kpm) {
                Storage::delete('public/' . $anggota->kpm);
            }
            $data['kpm'] = $request->file('kpm')->store('uploads/kpm', 'public');
        }

        if ($request->hasFile('ktp')) {
            // Simpan file baru dan hapus file lama jika ada
            if ($anggota->ktp) {
                Storage::delete('public/' . $anggota->ktp);
            }
            $data['ktp'] = $request->file('ktp')->store('uploads/ktp', 'public');
        }

        if ($request->hasFile('foto')) {
            // Simpan file baru dan hapus file lama jika ada
            if ($anggota->foto) {
                Storage::delete('public/' . $anggota->foto);
            }
            $data['foto'] = $request->file('foto')->store('uploads/foto', 'public');
        }

        // dd($data);

        // Update data anggota
        $anggota->update($data);

        return redirect()->back()->with('success', 'Data anggota berhasil diperbarui.');
    }


    // softDelete
    // proses hapus data secara sementara (masukan ke dalam tempat sampah)

    // restore
    // mengembalikan data dari status softDelete (keluarkan dari tempat sampah)

    // forceDelete
    // menghapus data secara permanenuse Illuminate\Support\Facades\Storage;

    public function forceDelete($id)
    {
        // Cari data anggota termasuk yang sudah soft delete
        $anggota = Anggota::withTrashed()->findOrFail($id);

        // Hapus file foto jika ada
        if ($anggota->foto && Storage::disk('public')->exists($anggota->foto)) {
            Storage::disk('public')->delete($anggota->foto);
        }

        // Hapus file kpm jika ada
        if ($anggota->kpm && Storage::disk('public')->exists($anggota->kpm)) {
            Storage::disk('public')->delete($anggota->kpm);
        }

        // Hapus file ktp jika ada
        if ($anggota->ktp && Storage::disk('public')->exists($anggota->ktp)) {
            Storage::disk('public')->delete($anggota->ktp);
        }

        // Force delete dari database
        $anggota->forceDelete();

        return redirect()->route('admin.anggota.index')->with('success', 'Data anggota berhasil dihapus permanen.');
    }

}