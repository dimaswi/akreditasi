<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $table = 'catatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bab', 
        'elemen_penilaian',
        'ep',
        'jenis_dokumen',
        'catatan',
    ];
}
