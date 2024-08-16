<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bsatpam extends Model
{
    protected $table = "bsatpam";
    protected $primarykey = "id";
    protected $fillable =[
        'id',
        'avatar',
        'nrp_satpam',
        'nama',
        'nip',
        'ttl',
        'id_jabatan',
        'grade',
        'id_lokasi',
        'departemen',
        'status_kontrak',
        'jenis_kelamin',
        'pendidikan',
        'martial_status',
        'alamat_tinggal',
        'no_telp',
        'delstatus',
    ];

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class,"id_jabatan");
    }

    public function lokasi()
    {
        return $this->belongsTo(lokasi::class,"id_lokasi");
    }
}
