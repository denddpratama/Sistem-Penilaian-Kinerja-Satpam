<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekomendasi extends Model
{
    protected $table = "rekomendasi";
    protected $primarykey = "id";
    protected $fillable =[
        'id',
        'nama_rekomendasi',

    ];

    public function rekomendasi()
    {
        return $this->hasMany(rekomendasi::class);
    }
}
