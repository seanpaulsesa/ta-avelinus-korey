<?php

namespace App\Http\Controllers\admin\datamaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Eelcol\LaravelBootstrapAlerts\Facade\BootstrapAlerts;
use Illuminate\Support\Facades\Storage;

// models
use App\Models\User;
use App\Models\ProgramStudi;
use App\Models\Fakultas;
use App\Models\Kampus;

class ProgramStudiController extends Controller
{

    // index
    // menampilkan halaman data 
    public function index()
    {
        // Ambil parameter pencarian
        $search = request()->search;

        // Mulai query dan include relasi fakultas dan kampus
        $query = ProgramStudi::with(['fakultas.kampus']);
        
        // Jika ada pencarian, tambahkan kondisi where
        if ($search) {
            $query->where('nama_program_studi', 'LIKE', '%' . $search . '%');
        }
        
        // Urutkan dan paginasi
        $datas = $query->orderBy('nama_program_studi', 'asc')->paginate(10);

        $pageTitle = 'Semua Program Studi';
        $pageDescription = 'Menampilkan semua data Program Studi.';

        return view('admin.programstudi.index', compact(
            'pageTitle',
            'pageDescription',
            'datas',
        ))->with('i', (request()->input('page', 1) - 1) * 10);
    }



    public function getFakultasByKampus($kampus_id)
    {
        $fakultas = Fakultas::where('kampus_id', $kampus_id)->get();
        return response()->json($fakultas);
    }



    // create
    // menampilkan form tambah data
    public function create()
    {

        // Ambil data fakultas dan kampus untuk dropdown
        $fakultas = Fakultas::orderBy('nama_fakultas', 'asc')->get();
        $kampus = Kampus::orderBy('nama_kampus', 'asc')->get();

        $pageTitle = 'Tambah Program Studi Baru';
        $pageDescription = 'Formulir tambah data program studi baru.';

        return view('admin.programstudi.form', compact(
            'pageTitle',
            'pageDescription',
            'fakultas',
            'kampus'
        ));
    }

    // store
    // proses mengirimkan data ke dalam database
    public function store(Request $request)
    {
        // Validasi 
        $request->validate([
            'nama_program_studi' => 'required',
        ], [
            'nama_program_studi.required' => 'Nama program studi wajib dilengkapi.',
        ]);

        // Inisialisasi array data
        $data = [
            'fakultas_id'        => $request->fakultas_id,
            'nama_program_studi' => $request->nama_program_studi,
            'keterangan'         => $request->keterangan,
        ];

        // Simpan data dan ambil instance-nya
        $dataCreated = ProgramStudi::create($data);

        return redirect()->route('admin.programstudi.show', $dataCreated->id)
            ->with('success', 'Data berhasil disimpan.');
    }

    // show
    // menampilkan halaman detail
    public function show($id)
    {
        // Ambil data Program Studi beserta Fakultas dan Kampus-nya
        $data = ProgramStudi::with('fakultas.kampus')->findOrFail($id);

        $pageTitle = 'Detail Program Studi';
        $pageDescription = 'Menampilkan detail data.';

        return view('admin.programstudi.detail', compact(
            'pageTitle',
            'pageDescription',
            'data'
        ));
    }

    // edit
    // menampilkan form ubah data
    public function edit($id)
    {

        // Ambil data fakultas dan kampus untuk dropdown
        $fakultas = Fakultas::orderBy('nama_fakultas', 'asc')->get();
        $kampus = Kampus::orderBy('nama_kampus', 'asc')->get();

        // $data = ProgramStudi::findOrFail($id);
        $data = ProgramStudi::with('fakultas.kampus')->findOrFail($id);

        $pageTitle = 'Ubah programstudi';
        $pageDescription = 'Menampilkan formulir ubah data.';

        return view('admin.programstudi.form', compact(
            'pageTitle',
            'pageDescription',
            'data',
            'fakultas',
            'kampus'
        ));
    }

    // update
    // proses ubah simpan data yang dirubah ke database
    
    // update
    // proses memperbarui data ke dalam database
    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'nama_program_studi' => 'required',
        ], [
            'nama_program_studi.required' => 'Bagian ini wajib dilengkapi.',
        ]);

        // Temukan data berdasarkan ID
        $programstudi = ProgramStudi::findOrFail($id);

        // Update data
        $programstudi->update([
            'nama_program_studi' => $request->nama_program_studi,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->route('admin.programstudi.show', $id)->with('success', 'Data berhasil diperbarui.');
    }


    // softDelete
    // proses hapus data secara sementara (masukan ke dalam tempat sampah)

    // restore
    // mengembalikan data dari status softDelete (keluarkan dari tempat sampah)

    // forceDelete
    // menghapus data secara permanenuse Illuminate\Support\Facades\Storage;

    public function forceDelete($id)
    {
        // Cari data termasuk yang sudah soft delete
        $data = ProgramStudi::findOrFail($id);
        // Force delete dari database
        $data->forceDelete();

        return redirect()->route('admin.programstudi.index')->with('success', 'Data berhasil dihapus permanen.');
    }

}