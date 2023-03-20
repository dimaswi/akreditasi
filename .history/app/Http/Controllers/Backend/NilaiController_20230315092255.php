<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index()
    {
        $uid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9)

        return view('backend.nilai');
    }

    public function getNilai()
    {
        $data = DB::table('elemen_penilaian')->orderBy('bab', 'ASC')->get();

        return $data;
    }

    public function getDocument()
    {
        $ep = $_GET['ep'];
        $data = DB::table('elemen_penilaian')->join('dokumen_akreditasi','elemen_penilaian.ep','=','dokumen_akreditasi.ep')->get();

        return $data;
    }
}
