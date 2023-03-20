<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index()
    {
        $bab = DB::table('bab')->get();
        $standart = DB::table('ep')->get
        return view('backend.nilai', compact('bab'));
    }
}
