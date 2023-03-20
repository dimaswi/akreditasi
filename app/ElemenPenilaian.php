<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElemenPenilaian extends Model
{
    protected $table = 'ep';

    protected $primaryKey = 'id';

    protected $fillable = [
        'elemen_penilaian',
        'bab',
    ];
}
