<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramStudi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fakultas_id',
        'nama_program_studi',
        'keterangan',
    ];

    // Relasi: Banyak program studi dimiliki oleh satu fakultas
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    // Relasi: Satu fakultas memiliki banyak anggota/mahasiswa
    public function anggotas()
    {
        return $this->hasMany(Anggota::class);
    }
}
