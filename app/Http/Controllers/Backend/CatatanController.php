<?php

namespace App\Http\Controllers\Backend;

use App\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CatatanController extends Controller
{
    public function getCatatan()
    {
        $ep = $_GET['ep'];
        $catatan = DB::table('messages')->where('ep', $ep)->get();

        return $catatan;
    }

    public function postCatatan(Request $request)
    {
        $catatan = new Catatan();
        $catatan->ep = $_GET['ep'];
        $catatan->user_id = $_GET['user_id'];
        $catatan->message = $_GET['message'];
        $catatan->save();

        return 'Berhasil Disimpan!!';
    }
}
