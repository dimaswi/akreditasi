<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElemenPenilaian extends Model
{
    /protected $table = 'EP';
    protected $primaryKey = 'id';
    protected $fillable = [
        'elemen_penilaian' 
    ];
}
