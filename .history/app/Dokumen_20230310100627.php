<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen_akreditasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'elemen_penilaian' 
    ];
}
