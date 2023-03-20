<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ep',
        'user_id',
        'message',
    ];
}
