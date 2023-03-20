<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EP extends Model
{
    protected $table = 'elemen_penilaian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'elemen_penilaian', 
        'bab',
        'ep'
    ];
}
