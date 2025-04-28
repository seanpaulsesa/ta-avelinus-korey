<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Ilmu Komputer dan Data Sains',
                'keterangan' => 'Menyediakan program studi di bidang teknologi informasi.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Ekonomi, Bisnis, dan Kewirausahaan',
                'keterangan' => 'Berfokus pada ilmu manajemen dan akuntansi.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Teknik dan Rekayasa Industri',
                'keterangan' => 'Menyelenggarakan program teknik sipil, elektro, mesin, dan lainnya.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Ilmu Administrasi dan Politik Publik',
                'keterangan' => 'Menawarkan pendidikan di bidang administrasi dan politik.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Pendidikan dan Pelatihan Profesi',
                'keterangan' => 'Mencetak tenaga pendidik profesional.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Sistem Informasi dan Teknologi Digital',
                'keterangan' => 'Menyediakan program studi di bidang teknologi informasi.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Bisnis dan Manajemen Strategis',
                'keterangan' => 'Berfokus pada ilmu manajemen dan akuntansi.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Teknik Sipil dan Infrastruktur',
                'keterangan' => 'Menyelenggarakan program teknik sipil, elektro, mesin, dan lainnya.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Politik dan Ilmu Pemerintahan',
                'keterangan' => 'Menawarkan pendidikan di bidang administrasi dan politik.',
            ],
            [
                'kampus_id' => 1,
                'nama_fakultas' => 'Fakultas Pendidikan Dasar dan Anak Usia Dini',
                'keterangan' => 'Mencetak tenaga pendidik profesional.',
            ],
            [
                'kampus_id' => 11,
                'nama_fakultas' => 'Fakultas Informatika dan Aplikasi Digital',
                'keterangan' => 'Menyediakan program studi di bidang teknologi informasi.',
            ],
            [
                'kampus_id' => 12,
                'nama_fakultas' => 'Fakultas Ekonomi Digital dan Keuangan',
                'keterangan' => 'Berfokus pada ilmu manajemen dan akuntansi.',
            ],
            [
                'kampus_id' => 13,
                'nama_fakultas' => 'Fakultas Teknik Elektro dan Komputer',
                'keterangan' => 'Menyelenggarakan program teknik sipil, elektro, mesin, dan lainnya.',
            ],
            [
                'kampus_id' => 14,
                'nama_fakultas' => 'Fakultas Ilmu Sosial Terapan',
                'keterangan' => 'Menawarkan pendidikan di bidang administrasi dan politik.',
            ],
            [
                'kampus_id' => 15,
                'nama_fakultas' => 'Fakultas Pendidikan Vokasi dan Profesi',
                'keterangan' => 'Mencetak tenaga pendidik profesional.',
            ],
        ];
        
        foreach ($data as $item) {
            \App\Models\Fakultas::create($item);
        }
        
    }
}
