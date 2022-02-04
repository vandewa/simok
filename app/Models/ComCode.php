<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComCode extends Model
{
    use HasFactory;

    protected $table ='com_codes';
    protected $guarded = [];
    protected $primaryKey = 'code_cd';
    public $incrementing = false;
}
