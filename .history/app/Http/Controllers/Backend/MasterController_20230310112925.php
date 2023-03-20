<?php

namespace App\Http\Controllers\Backend;

use App\BAB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {

        return view('backend.master');
    }

    public function simpanBAB(Request $request)
    {
        $bab = new BAB();
        $bab->BAB = $request->bab;
        $bab->save();

        return view('backend/master');
    }
}
