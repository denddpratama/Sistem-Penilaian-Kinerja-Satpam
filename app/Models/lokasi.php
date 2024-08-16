<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $table = "lokasi";
    protected $primarykey = "id";
    protected $fillable =[
        'id',
        'nama_lokasi',
        'delstatus',
    ];

    public function lokasi()
    {
        return $this->hasMany(lokasi::class);
    }
}
