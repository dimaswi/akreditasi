<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen_akreditasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bab', 
        'elemen_penilaian',
        'ep',
        'filenames' 
    ];
}
