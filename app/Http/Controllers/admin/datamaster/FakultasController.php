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
use App\Models\Fakultas;
use App\Models\Kampus;

class FakultasController extends Controller
{

    // index
    // menampilkan halaman data 
    public function index()
    {
        // Ambil parameter pencarian
        $search = request()->search;

        // Mulai query dan eager load relasi 'kampus'
        $query = Fakultas::with('kampus');
        
        // Jika ada pencarian, tambahkan kondisi where
        if ($search) {
            $query->where('nama_fakultas', 'LIKE', '%' . $search . '%');
        }
        
        // Urutkan dan paginasi
        $datas = $query->orderBy('nama_fakultas', 'asc')->paginate(10);

        $pageTitle = 'Semua Fakultas';
        $pageDescription = 'Menampilkan semua data fakultas.';

        return view('admin.fakultas.index', compact(
            'pageTitle',
            'pageDescription',
            'datas',
        ))->with('i', (request()->input('page', 1) - 1) * 10);
    }





    // create
    // menampilkan form tambah data
    public function create()
    {
        $kampus = Kampus::all(); // Ambil semua data kampus untuk dropdown

        $pageTitle = 'Tambah Fakultas Baru';
        $pageDescription = 'Formulir tambah data fakultas baru.';

        return view('admin.fakultas.form', compact(
            'pageTitle',
            'pageDescription',
            'kampus'
        ));
    }

    // store
    // proses mengirimkan data ke dalam database
    public function store(Request $request)
    {

        // Validasi 
        $request->validate([
            'kampus_id' => 'required',
            'nama_fakultas' => 'required',
        ], [
            'kampus_id.required' => 'Kampus harus dipilih',
            'nama_fakultas.required' => 'Nama wajib dilengkapi.',
        ]);

        // Inisialisasi array data
        $data = [
            'kampus_id'        => $request->kampus_id,
            'nama_fakultas'        => $request->nama_fakultas,
            'keterangan'          => $request->keterangan,
        ];


        fakultas::create($data);

        return redirect()->route('admin.fakultas.index')->with('success', 'Data berhasil disimpan.');
    }

    // show
    // menampilkan halaman detail
    public function show($id)
    {

        $data = Fakultas::with('kampus')->findOrFail($id);

        $pageTitle = 'Detail fakultas';
        $pageDescription = 'Menampilkan detail data.';

        return view('admin.fakultas.detail', compact(
            'pageTitle',
            'pageDescription',
            'data'
        ));
    }

    // edit
    // menampilkan form ubah data
    public function edit($id)
    {
        
        $kampus = Kampus::all(); // Ambil semua data kampus untuk dropdown
        $data = fakultas::findOrFail($id);

        $pageTitle = 'Ubah fakultas';
        $pageDescription = 'Menampilkan formulir ubah data.';

        return view('admin.fakultas.form', compact(
            'pageTitle',
            'pageDescription',
            'data',
            'kampus'
        ));
    }

    // update
    // proses memperbarui data ke dalam database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_fakultas' => 'required',
            'kampus_id' => 'required', // validasi wajib dan kampus harus ada di tabel kampus
        ], [
            'nama_fakultas.required' => 'Bagian ini wajib dilengkapi.',
            'kampus_id.required' => 'Kampus harus dipilih.',
        ]);

        // Temukan data berdasarkan ID
        $fakultas = Fakultas::findOrFail($id);

        // Update data
        $fakultas->update([
            'nama_fakultas' => $request->nama_fakultas,
            'kampus_id' => $request->kampus_id,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->route('admin.fakultas.show', $id)->with('success', 'Data berhasil diperbarui.');
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
        $data = fakultas::findOrFail($id);
        // Force delete dari database
        $data->forceDelete();

        return redirect()->route('admin.fakultas.index')->with('success', 'Data berhasil dihapus permanen.');
    }

}