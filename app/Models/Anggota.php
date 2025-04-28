<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_studi_id',
        'tanggal_pendaftaran',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat_tinggal',
        'no_hp',
        'email',
        'kampus',
        'fakultas',
        'program_studi',
        'foto',
        'kpm',
        'nim',
        'ktp',
        'status',
        'alumni',
        'keterangan',
    ];

    // Relasi: Banyak anggota/mahasiswa dimiliki oleh satu program studi
    public function programstudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id', 'id');
    }
}
