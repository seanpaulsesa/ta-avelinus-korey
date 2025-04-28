<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fakultas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kampus_id',
        'nama_fakultas',
        'keterangan',
    ];

    // Relasi: Banyak fakultas dimiliki oleh satu kampus
    public function kampus()
    {
        return $this->belongsTo(Kampus::class);
    }

    // Relasi: Satu fakultas memiliki banyak program studi
    public function programStudis()
    {
        return $this->hasMany(ProgramStudi::class);
    }
}
