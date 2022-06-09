<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ormas extends Model
{
    use HasFactory, LogsActivity;
    protected $table ='ormas';
    protected $guarded = [];
    protected static $logAttributes = ['*'];



    // public function bidang()
    // {
    //     return $this->hasMany(Bidang::class, 'id_ormas');
    // }
    public function files()
    {
        return $this->hasOne(Files::class, 'id_ormas');
    }

    public function getFullNameAttribute()
    {
        return ucwords($this->nama_organisasi);
    }

    

}
