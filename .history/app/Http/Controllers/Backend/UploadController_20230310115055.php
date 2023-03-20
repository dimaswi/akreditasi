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

        return view('backend.upload', compact('bab', 'ep'));
    }

    public function FunctionName(Request $request)
    {
        $bab = $_GET['bab'];

        $EP = DB::table('eo')
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
