<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    use HasFactory;
    protected $table = 'kerusakan';
    protected $fillable = [
        'nama_infrastruktur',
        'jenis_infrastruktur',
        'alamat',
        'deskripsi',
        'latitude',
        'longitude',
        'status',
        'tanggal_kerusakan',
        'upload_foto'
    ];
}
