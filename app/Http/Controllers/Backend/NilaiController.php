<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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

    public function getMsg()
    {
        $data = DB::table('elemen_penilaian')
            ->join('messages', 'elemen_penilaian.uid', '=', 'messages.ep')->get();

        return $data;
    }

    public function getDocument()
    {
        $ep = $_GET['ep'];
        $data = DB::table('elemen_penilaian')
            ->join('dokumen_akreditasi', 'elemen_penilaian.ep', '=', 'dokumen_akreditasi.ep')
            ->where('dokumen_akreditasi.ep', $ep)
            ->get();

        return $data;
    }
}
