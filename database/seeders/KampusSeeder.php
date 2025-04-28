<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kampus;

class KampusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'nama_kampus' => 'Universitas Papua',
                'keterangan' => 'Kampus negeri di wilayah Papua Barat.',
            ],
            [
                'nama_kampus' => 'Universitas Cenderawasih',
                'keterangan' => 'Kampus negeri terbesar di Papua.',
            ],
            [
                'nama_kampus' => 'Institut Teknologi Papua',
                'keterangan' => 'Institut yang fokus pada pengembangan teknologi dan sains.',
            ],
            [
                'nama_kampus' => 'STIE Port Numbay',
                'keterangan' => 'Sekolah Tinggi Ilmu Ekonomi di Jayapura.',
            ],
            [
                'nama_kampus' => 'Universitas Kristen Wamena',
                'keterangan' => 'Perguruan tinggi swasta di pegunungan tengah Papua.',
            ],
            [
                'nama_kampus' => 'Universitas Sains dan Teknologi Jayapura',
                'keterangan' => 'Perguruan tinggi yang menawarkan program teknik dan sains.',
            ],
            [
                'nama_kampus' => 'Politeknik Negeri Fakfak',
                'keterangan' => 'Politeknik negeri yang terletak di Kabupaten Fakfak.',
            ],
            [
                'nama_kampus' => 'STMIK El Rahma Jayapura',
                'keterangan' => 'Sekolah tinggi manajemen informatika dan komputer.',
            ],
            [
                'nama_kampus' => 'Universitas Yapis Papua',
                'keterangan' => 'Universitas swasta yang berada di bawah naungan Yapis.',
            ],
            [
                'nama_kampus' => 'Universitas Ottow Geissler Papua',
                'keterangan' => 'Universitas Kristen yang memiliki berbagai jurusan.',
            ],
            [
                'nama_kampus' => 'Universitas Amal Ilmiah YAPIS Wamena',
                'keterangan' => 'Perguruan tinggi yang melayani pendidikan tinggi di Wamena.',
            ],
            [
                'nama_kampus' => 'STKIP Muhammadiyah Manokwari',
                'keterangan' => 'Sekolah tinggi keguruan dan ilmu pendidikan di Manokwari.',
            ],
            [
                'nama_kampus' => 'STT Erikson Tritt',
                'keterangan' => 'Sekolah tinggi teologi di Tanah Papua.',
            ],
            [
                'nama_kampus' => 'Akademi Keperawatan YAPIS Sorong',
                'keterangan' => 'Akademi keperawatan di kota Sorong.',
            ],
            [
                'nama_kampus' => 'Poltekkes Kemenkes Jayapura',
                'keterangan' => 'Politeknik kesehatan milik Kementerian Kesehatan RI.',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Kampus::create($item);
        }
    }

}
