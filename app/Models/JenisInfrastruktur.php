<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisInfrastruktur extends Model
{
    use HasFactory;
    protected $table = 'table_jenis';
    protected $fillable = [
        'jenis_infrastruktur'
    ];
}
