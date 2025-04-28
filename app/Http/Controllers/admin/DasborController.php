<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// models
use App\Models\User;
use App\Models\Anggota;
use App\Models\Kampus;
use App\Models\Fakultas;
use App\Models\ProgramStudi;

class DasborController extends Controller
{
      
    // index
    public function index()
    {

        // statistik anggota berdasarkan status
        $anggotaTotal = Anggota::count();
        $anggotaBaru = Anggota::where('status', 'Baru')->count();
        $anggotaPindahMasuk = Anggota::where('status', 'Pindah Masuk')->count();
        $anggotaPindahKeluar = Anggota::where('status', 'Pindah Keluar')->count();
        $anggotaAlumni = Anggota::where('status', 'Alumni')->count();
        $anggotaDraft = Anggota::where('status', 'Draft')->count();

        $totalKampus = Kampus::count();
        $totalFakultas = Fakultas::count();
        $totalProgramStudi = ProgramStudi::count();



        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Dasbor';
        $pageDescription = 'Halaman utama sistem informasi ketika pengguna berhasil login. Menampilkan berbagai rekapan data hasil pengelolaan pada sistem informasi.';
    
        return view('admin.dasbor', compact(
            'pageTitle',
            'pageDescription',
            'anggotaTotal',
            'anggotaBaru',
            'anggotaPindahMasuk',
            'anggotaPindahKeluar',
            'anggotaAlumni',
            'anggotaDraft',
            'totalKampus',
            'totalFakultas',
            'totalProgramStudi',
        ));
    }



    // Statistik Anggota Berdasarkan Status
    public function getStatistikAnggota()
    {

        // statistik anggota berdasarkan status
        $anggotaTotal = Anggota::count();
        $anggotaBaru = Anggota::where('status', 'Baru')->count();
        $anggotaPindahMasuk = Anggota::where('status', 'Pindah Masuk')->count();
        $anggotaPindahKeluar = Anggota::where('status', 'Pindah Keluar')->count();
        $anggotaAlumni = Anggota::where('status', 'Alumni')->count();
        $anggotaDraft = Anggota::where('status', 'Draft')->count();
        
        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Statistik Anggota Berdasarkan Status';
        $pageDescription = 'Halaman ini menampilkan statistik anggota berdasarkan statusnya.';
    
        return view('statistik.anggota', compact(
            'pageTitle',
            'pageDescription',
            'anggotaTotal',
            'anggotaBaru',
            'anggotaPindahMasuk',
            'anggotaPindahKeluar',
            'anggotaAlumni',
            'anggotaDraft',
        ));
    }

    // Statistik Alumni
    public function getStatistikAlumni()
    {
        // Data total alumni per tahun
        $alumniPerTahun = Anggota::select('alumni as alumni', \DB::raw('COUNT(*) as total'))
        ->whereNotNull('alumni') // pastikan field alumni tidak null
        ->where('status', 'alumni') // hanya status alumni
        ->groupBy('alumni')
        ->orderBy('alumni', 'desc')
        ->get();
        
        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Statistik Alumni';
        $pageDescription = 'Halaman ini menampilkan statistik alumni berdasarkan tahun kelulusan.';

        return view('statistik.alumni', compact(
            'pageTitle',
            'pageDescription',
            'alumniPerTahun'
        ));
    }

    // Statistik Program Studi, Fakultas & Universitas
    public function getStatistikProgramStudi()
    {
        // tabel anggota memiliki relasi dengan program studi, program studi memiliki relasi dengan fakultas, dan fakultas memiliki relasi dengan kampus. Menampilkan data kampus dan jumlah anggota berdasarkan kampus pada satu tabel data
        $anggotaKampus = Anggota::with(['programstudi.fakultas.kampus'])
            ->selectRaw('program_studi_id, COUNT(*) as total')
            ->groupBy('program_studi_id')
            ->get();
        
        // teks untuk judul dan deskripsi halaman
        $pageTitle = 'Statistik Kampus';
        $pageDescription = 'Halaman ini menampilkan statistik anggota berdasarkan kampus.';

        return view('statistik.program-studi', compact(
            'pageTitle',
            'pageDescription',
            'anggotaKampus',
        ));
    }


}
