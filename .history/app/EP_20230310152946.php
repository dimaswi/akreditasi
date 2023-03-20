<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EP extends Model
{
    protected $table = 'ep';
    protected $primaryKey = 'id';
    protected $fillable = [
        'elemen_penilaian', 
        'bab' 
    ];
}
}
