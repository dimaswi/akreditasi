<?php

namespace App\Http\Controllers\Backend;

use App\Catatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanController extends Controller
{
    public function getCatatan()
    {
        $ep = $_GET['ep'];
        $catatan = DB::table('catatan')->where('ep', $ep)->get();

        return $catatan;

    }

    public function postCatatan(Request $request)
    {
        $catatan = new Catatan()
        $catatan->bab = $request->bab;
        $catatan->standart = $request->ep;
        $catatan->bab = $request->bab;
    }
}
