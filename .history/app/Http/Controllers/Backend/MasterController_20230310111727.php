<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        $bab = DB::table('bab')->select('bab')->get();
        $ep = DB::table('ep')->select('elemen_penilaian')->get();

        return view('backend.upload', compact('bab', 'ep'));
    }
}
