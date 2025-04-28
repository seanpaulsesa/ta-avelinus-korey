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
use App\Models\Kampus;

class KampusController extends Controller
{

    // index
    // menampilkan halaman data 
    public function index()
    {
        // Ambil parameter pencarian
        $search = request()->search;

        // Mulai query dari 
        $query = Kampus::query();
        
        // Jika ada pencarian, tambahkan kondisi where
        if ($search) {
            $query->where('nama_kampus', 'LIKE', '%' . $search . '%');
        }
        
        // Urutkan berdasarkan nama_kampus ascending dan paginasi
        $datas = $query->orderBy('nama_kampus', 'asc')->paginate(10);

        $pageTitle = 'Semua Kampus';
        $pageDescription = 'Menampilkan semua data kampus.';

        return view('admin.kampus.index', compact(
            'pageTitle',
            'pageDescription',
            'datas',
        ))->with('i', (request()->input('page', 1) - 1) * 10);
    }




    // create
    // menampilkan form tambah data
    public function create()
    {

        $pageTitle = 'Tambah Kampus Baru';
        $pageDescription = 'Formulir tambah data kampus baru.';

        return view('admin.kampus.form', compact(
            'pageTitle',
            'pageDescription',
        ));
    }

    // store
    // proses mengirimkan data ke dalam database
    public function store(Request $request)
    {

        // Validasi 
        $request->validate([
            'nama_kampus' => 'required',
        ], [
            'nama_kampus.required' => 'Nama wajib dilengkapi.',
        ]);

        // Inisialisasi array data
        $data = [
            'nama_kampus'        => $request->nama_kampus,
            'keterangan'          => $request->keterangan,
        ];


        Kampus::create($data);

        return redirect()->route('admin.kampus.index')->with('success', 'Data berhasil disimpan.');
    }

    // show
    // menampilkan halaman detail
    public function show($id)
    {

        $data = Kampus::findOrFail($id);

        $pageTitle = 'Detail Kampus';
        $pageDescription = 'Menampilkan detail data.';

        return view('admin.kampus.detail', compact(
            'pageTitle',
            'pageDescription',
            'data'
        ));
    }

    // edit
    // menampilkan form ubah data
    public function edit($id)
    {
        $data = Kampus::findOrFail($id);

        $pageTitle = 'Ubah Kampus';
        $pageDescription = 'Menampilkan formulir ubah data.';

        return view('admin.kampus.form', compact(
            'pageTitle',
            'pageDescription',
            'data'
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
            'nama_kampus' => 'required',
        ], [
            'nama_kampus.required' => 'Bagian ini wajib dilengkapi.',
        ]);

        // Temukan data berdasarkan ID
        $kampus = Kampus::findOrFail($id);

        // Update data
        $kampus->update([
            'nama_kampus' => $request->nama_kampus,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->route('admin.kampus.show', $id)->with('success', 'Data berhasil diperbarui.');
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
        $data = Kampus::findOrFail($id);
        // Force delete dari database
        $data->forceDelete();

        return redirect()->route('admin.kampus.index')->with('success', 'Data berhasil dihapus permanen.');
    }

}