<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanController extends Controller
{
    public function getCatatan()
    {
        $catatan = DB::table('catatan')->where('ep', $ep)->get()
    }
}
