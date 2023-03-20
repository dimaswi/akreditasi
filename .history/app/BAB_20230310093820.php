<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BAB extends Model
{
    protected $table = 'BAB';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bab' 
    ];
}
