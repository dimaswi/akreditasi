<?php

namespace App\Http\Controllers\Backend;

use App\EP;
use App\BAB;
use App\ElemenPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    public function index()
    {
        $bab = DB::table('bab')->select('bab')->get();
        $list_standar = DB::table('ep')->get();
        $list_ep = DB::table('elemen_penilaian')->get();
        $list_bab = DB::table('bab')->get();

        return view('backend.master', compact('bab', 'list_standar', 'list_ep', 'list_bab'));
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
        $ep->uid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
        $ep->ep = $request->elemen;
        $ep->elemen_penilaian = $request->standart;
        $ep->bab = $request->bab;
        $ep->save();

        return redirect('admin/master')->withSuccess('Elemen Penilaian Berhasil Disimpan');
    }

    public function ajaxBAB()
    {
        $bab = $_GET['bab'];
        $list_bab = DB::table('bab')->where('BAB', $bab)->get();

        return $list_bab;
    }

    public function ajaxStandar()
    {
        $standar = $_GET['standar'];
        $list_bab = DB::table('ep')->where('bab', $standar)->get();

        return $list_bab;
    }

    public function ajaxEP()
    {
        $bab = $_GET['bab'];
        $ep = $_GET['ep'];

        $data = DB::table('elemen_penilaian')->where('bab', $bab)->where('elemen_penilaian', $ep)->orderBy('ep')->get();

        return $data;
    }

    public function editBab()
    {
        $bab = $_GET['bab'];
        $id = $_GET['id'];
        $input_bab = $_GET['input_bab'];

        $update = DB::table('bab')->where('id', $id)->update([
            'BAB' => $input_bab,
        ]);

        $update_standart = DB::table('ep')->where('bab', $bab)->update([
            'bab' => $input_bab,
        ]);

        $update_ep = DB::table('elemen_penilaian')->where('bab', $bab)->update([
            'bab' => $input_bab,
        ]);

        $dokumentasi = DB::table('dokumen_akreditasi')->where('bab', $bab)->update([
            'bab' => $input_bab,
        ]);

        return $update;
    }

    public function editStandar()
    {
        $id = $_GET['id'];
        $input_standar = $_GET['standar'];
        $standar = $_GET['std'];

        $update = DB::table('ep')->where('id', $id)->update([
            'elemen_penilaian' => $input_standar,
        ]);

        $update_dokumen = DB::table('dokumen_akreditasi')->where('elemen_penilaian', $standar)->update([
            'elemen_penilaian' => $input_standar,
        ]);

        $update_ep = DB::table('elemen_penilaian')->where('elemen_penilaian', $standar)->update([
            'elemen_penilaian' => $input_standar,
        ]);

        return $update;
    }

    public function editEP()
    {
        $uid = $_GET['uid'];
        $input_ep = $_GET['ep'];

        $update = DB::table('elemen_penilaian')->where('uid', $uid)->update([
            'ep' => $input_ep,
        ]);

        $update = DB::table('dokumen_akreditasi')->where('uid', $uid)->update([
            'ep' => $input_ep,
        ]);

        return $update;
    }

    public function hapusBAB()
    {
        $bab = $_GET['bab'];

        $update = DB::table('bab')->where('BAB', $bab)->delete();

        $update_standart = DB::table('ep')->where('bab', $bab)->delete();

        $update_ep = DB::table('elemen_penilaian')->where('bab', $bab)->delete();

        $dokumentasi = DB::table('dokumen_akreditasi')->where('bab', $bab)->delete();

        return $dokumentasi;
    }

    public function hapusStandart()
    {
        $standart = $_GET['standart'];

        $update_standart = DB::table('ep')->where('elemen_penilaian', $standart)->delete();

        $update_ep = DB::table('elemen_penilaian')->where('elemen_penilaian', $standart)->delete();

        $dokumentasi = DB::table('dokumen_akreditasi')->where('elemen_penilaian', $standart)->delete();

        return $standart;
    }
}
