<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanOrmas extends Model
{
    use HasFactory;
    protected $table ='kegiatan_ormas';
    protected $guarded = [];

     public function ormas()
    {
        return $this->hasMany(Ormas::class, 'id_ormas');
    }
}
