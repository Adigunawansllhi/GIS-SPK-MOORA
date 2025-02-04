<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'nama',
        'no_hp',
        'nama_infrastruktur',
        'jenis_infrastruktur',
        'alamat',
        'deskripsi',
        'latitude',
        'longitude',
        'tanggal_kerusakan',
        'upload_foto'
    ];


    public function jenisInfrastruktur()
    {
        return $this->belongsTo(JenisInfrastruktur::class, 'jenis_infrastruktur'); // Pastikan nama kolom ini benar
    }
}
