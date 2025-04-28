<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;
use Illuminate\Support\Carbon;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {

        $data = [
            [
                'fakultas_id' => 1,
                'nama_program_studi' => 'Teknik Informatika',
                'keterangan' => 'Program studi yang mempelajari tentang pemrograman dan pengembangan perangkat lunak.',
            ],
            [
                'fakultas_id' => 1,
                'nama_program_studi' => 'Sistem Informasi',
                'keterangan' => 'Fokus pada integrasi antara teknologi informasi dan bisnis.',
            ],
            [
                'fakultas_id' => 2,
                'nama_program_studi' => 'Akuntansi',
                'keterangan' => 'Pembelajaran tentang pencatatan dan pelaporan keuangan.',
            ],
            [
                'fakultas_id' => 1,
                'nama_program_studi' => 'Manajemen',
                'keterangan' => 'Mempelajari ilmu kepemimpinan dan pengelolaan bisnis.',
            ],
            [
                'fakultas_id' => 2,
                'nama_program_studi' => 'Teknik Sipil',
                'keterangan' => 'Berfokus pada perencanaan dan konstruksi bangunan serta infrastruktur.',
            ],
            [
                'fakultas_id' => 1,
                'nama_program_studi' => 'Ilmu Komputer',
                'keterangan' => 'Studi tentang teori komputasi dan algoritma.',
            ],
            [
                'fakultas_id' => 2,
                'nama_program_studi' => 'Bisnis Digital',
                'keterangan' => 'Mempelajari transformasi bisnis berbasis teknologi digital.',
            ],
            [
                'fakultas_id' => 3,
                'nama_program_studi' => 'Perpajakan',
                'keterangan' => 'Fokus pada sistem perpajakan dan regulasinya di Indonesia.',
            ],
            [
                'fakultas_id' => 4,
                'nama_program_studi' => 'Kewirausahaan',
                'keterangan' => 'Mengembangkan jiwa usaha dan inovasi bisnis.',
            ],
            [
                'fakultas_id' => 5,
                'nama_program_studi' => 'Arsitektur',
                'keterangan' => 'Mempelajari seni dan teknik merancang bangunan.',
            ],
            [
                'fakultas_id' => 6,
                'nama_program_studi' => 'Pendidikan Matematika',
                'keterangan' => 'Menyiapkan tenaga pendidik di bidang matematika.',
            ],
            [
                'fakultas_id' => 6,
                'nama_program_studi' => 'Pendidikan Bahasa Inggris',
                'keterangan' => 'Program studi yang mempersiapkan guru bahasa Inggris.',
            ],
            [
                'fakultas_id' => 7,
                'nama_program_studi' => 'Ilmu Hukum',
                'keterangan' => 'Studi tentang sistem hukum, peraturan, dan penerapannya.',
            ],
            [
                'fakultas_id' => 8,
                'nama_program_studi' => 'Ilmu Pemerintahan',
                'keterangan' => 'Mempelajari sistem pemerintahan, politik, dan kebijakan publik.',
            ],
            [
                'fakultas_id' => 9,
                'nama_program_studi' => 'Kesehatan Masyarakat',
                'keterangan' => 'Fokus pada promosi kesehatan dan pencegahan penyakit dalam masyarakat.',
            ],
            [
                'fakultas_id' => 1,
                'nama_program_studi' => 'Teknik Informatika',
                'keterangan' => 'Program studi yang mempelajari tentang pemrograman dan pengembangan perangkat lunak.',
            ],
            [
                'fakultas_id' => 1,
                'nama_program_studi' => 'Sistem Informasi',
                'keterangan' => 'Fokus pada integrasi antara teknologi informasi dan bisnis.',
            ],
            [
                'fakultas_id' => 12,
                'nama_program_studi' => 'Akuntansi',
                'keterangan' => 'Pembelajaran tentang pencatatan dan pelaporan keuangan.',
            ],
            [
                'fakultas_id' => 13,
                'nama_program_studi' => 'Manajemen',
                'keterangan' => 'Mempelajari ilmu kepemimpinan dan pengelolaan bisnis.',
            ],
            [
                'fakultas_id' => 14,
                'nama_program_studi' => 'Teknik Sipil',
                'keterangan' => 'Berfokus pada perencanaan dan konstruksi bangunan serta infrastruktur.',
            ],
        ];
        

        foreach ($data as $item) {
            \App\Models\ProgramStudi::create($item);
        }
    }
}
