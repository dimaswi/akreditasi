<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    /protected $table = 'ep';
    protected $primaryKey = 'id';
    protected $fillable = [
        'elemen_penilaian' 
    ];
}
