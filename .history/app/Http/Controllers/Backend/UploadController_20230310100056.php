<?php

namespace App\Http\Controllers\Backend;

use App\BAB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function index()
    {
        $bab = DB::table('bab')->select('bab')->get();
        $ep = DB::table('ep')->select('elemen_penelaian')->get();

        return view('backend.upload', compact('bab'));
    }
}
