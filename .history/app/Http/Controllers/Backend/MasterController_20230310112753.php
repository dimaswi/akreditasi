<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {

        return view('backend.master');
    }

    public function simpanBAB(Type $var = null)
    {
        # code...
    }
}
