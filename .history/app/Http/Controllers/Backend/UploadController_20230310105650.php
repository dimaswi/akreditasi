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
        $ep = DB::table('ep')->select('elemen_penilaian')->get();

        return view('backend.upload', compact('bab', 'ep'));
    }

    public function simpanDokumen(Request $request)
    {
        $this->validate($request, [
            'bab' => 'required',
            'ep' => 'required',
            'filenames' => 'required',
            'filenames.*' => 'required'
        ]);

        

        $files = [];
        if ($request->hasFile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('/dokumen/'), $name);
                $files[] = $name;
            }
        }

        dd($files);

        $file = new Dokumen();
        $file->bab = $request->bab;
        $file->elemen_penilaian = $request->ep;
        $file->filenames = $files;
        $file->save();

        return redirect('admin/upload');
    }
}
