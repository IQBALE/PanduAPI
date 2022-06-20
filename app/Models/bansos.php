<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bansos extends Model
{
    protected $table = 'bansos';
    
    protected $fillable = ['NIK', 'NO_KK','NAMA', 'NIK_CAPIL','NO_KK_CAPIL', 'NAMA_LNGKP_CAPIL','STATUS', 'KATEGORI','OPD_PENGAMPU', 'ALAMAT_CAPIL','KELURAHAN_CAPIL', 'KECAMATAN_CAPIL','DOMISILI', 'KET_NIK','JENIS_KELAMIN', 'KET_NAMA', 'KET_KK_NIK', 'USIA','LABEL', 'DATE'];
}