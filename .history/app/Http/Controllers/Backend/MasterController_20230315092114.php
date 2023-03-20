<?php

namespace App\Http\Controllers\Backend;

use App\BAB;
use App\ElemenPenilaian;
use App\EP;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function index()
    {
        $bab = DB::table('bab')->select('bab')->get();
        return view('backend.master', compact('bab'));
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
        $ep->bab = $request->bab_ep;
        $ep->save();
        
        return redirect('admin/master')->withSuccess('Standart Penilaian Berhasil Disimpan');
    }

    public function simpanElemen(Request $request)
    {
        $ep = new EP();
        $ep->uid = $request->elemen;
        $ep->ep = $request->elemen;
        $ep->elemen_penilaian = $request->standart;
        $ep->bab = $request->bab;
        $ep->save();
        
        return redirect('admin/master')->withSuccess('Elemen Penilaian Berhasil Disimpan');
    }
}
