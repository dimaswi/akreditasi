<?php

namespace App\Http\Controllers\Backend;

use App\BAB;
use App\Dokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function index()
    {
        $bab = DB::table('bab')->select('bab')->get();

        return view('backend.upload', compact('bab'));
    }

    public function ajaxEP(Request $request)
    {
        $bab = $_GET['bab'];

        $EP = DB::table('ep')->where('bab',$bab)->select('elemen_penilaian')->orderBy('elemen_penilaian')->get();

        return $EP;
    }

    public function ajaxElemen(Request $request)
    {
        $bab = $_GET['bab'];
        $ep = $_GET['ep'];

        $EP = DB::table('ep')->where('bab',$ep)->where('elemen_penilaian', $ep)->select('elemen_penilaian')->orderBy('elemen_penilaian')->get();

        return $EP;
    }

    public function simpanDokumen(Request $request)
    {
        $this->validate($request, [
            'bab' => 'required',
            'ep' => 'required',
        ]);



        $files = [];
        if ($request->hasFile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('files'), $name);
                // $files[] = $name;
                $file = new Dokumen();
                $file->bab = $request->bab;
                $file->elemen_penilaian = $request->ep;
                $file->filenames = $name;
                $file->save();
            }
        }

        return redirect('admin/upload')->withSuccess('File Berhasil Disimpan');
    }
}
