<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spenilaian extends Model
{
    use HasFactory;

    protected $table = "spenilaian";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'id_bsatpam',
        'tanggal_penilaian',
        'periode',
        'kualitas_kerja',
        'kuantitas_kerja',
        'profesionalisme',
        'inisiatif',
        'integritas',
        'komunikasi_tim',
        'kerja_sama_tim',
        'etika_kerja',
        'kedisiplinan',
        'kehadiran',
        'kesehatan_keselamatan',
        'keterangan',
        'nilai_s',
        'status_validasi',
        'delstatus',
    ];

    public function bsatpam()
    {
        return $this->belongsTo(Bsatpam::class, 'id_bsatpam');
    }
}