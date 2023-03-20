<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index()
    {
        return view('backend.nilai', compact('bab','standart','ep'));
    }

    public function getNilai()
    {
        $data = DB::table('elemen_penilaian')->get()
    }
}
