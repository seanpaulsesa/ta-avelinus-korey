<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kampus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_kampus',
        'keterangan',
    ];

    // Relasi: Satu kampus memiliki banyak fakultas
    public function fakultas()
    {
        return $this->hasMany(Fakultas::class);
    }
}
