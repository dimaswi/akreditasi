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
        dd($bab);
        return view('backend.upload');
    }
}
