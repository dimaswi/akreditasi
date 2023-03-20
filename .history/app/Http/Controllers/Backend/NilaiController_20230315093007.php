<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index()
    {

        return view('backend.nilai');
    }

    public function getNilai()
    {
        $data = DB::table('elemen_penilaian')->orderBy('bab', 'ASC')->get();

        return $data;
    }

    public function getDocument()
    {
        $ep = $_GET['uid'];
        $data = DB::table('elemen_penilaian')->join('dokumen_akreditasi','elemen_penilaian.ep','=','dokumen_akreditasi.ep')->get();

        return $data;
    }
}
