<?php

namespace App\Http\Controllers\Backend;

use App\BAB;
use App\ElemenPenilaian;
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

        return redirect('admin/master')->withSuccess('BAB Berhasil Disimpan');
    }

    public function simpanEP(Request $request)
    {
        $ep = new ElemenPenilaian();
        $ep->elemen_penilaian = $request->ep;
        $ep->save();
        
        return redirect('admin/master')->withSuccess('Elemen Penilaian Berhasil Disimpan');
    }
}
