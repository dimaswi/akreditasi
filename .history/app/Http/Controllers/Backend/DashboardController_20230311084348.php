<?php

namespace App\Http\Controllers\Backend;

use App\Dokumen;
use App\Http\Controllers\Controller;
use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (!auth()->user()) {
            return redirect(route('frontend.user.dashboard'))->withFlashDanger('You are not authorized to view admin dashboard.');
        }

        $bab = DB::table('bab')->get();

        return view('backend.dashboard', compact('bab'));
    }

    public function dokumenAkreditasi()
    {
        $bab = $_GET['bab'];
        $kriteria = $_GET['ep'];
        $elemen = $_GET['elemen'];

        $data = DB::table('dokumen_akreditasi')->where('bab', $bab)->where('elemen_penilaian', $kriteria)->where('ep', $elemen)->get();

        return $data;
    }

    public function simpanNilai(Request $request)
    {
        $ep = $request->data;

        $nilai = DB::table('dokumen_akreditasi')->where('ep', $ep)->update([
            'nilai' => $request->nilai
        ]);

        $nilai_ep = DB::table('elemen_penilaian')->where('ep', $ep)->update([
            'nilai_ep' => $request->nilai
        ]);

        return redirect('admin/dashboard')->withSuccess('Nilai Berhasil diUpdate!!');
    }

    public function hapusDokumen(Request $request)
    {
        // $id = $request->data;
        $id = $request->id;

        $dokumen = Dokumen::find($id);
        $dokumen->delete();

        return response()->json([
            'status' => 200
        ])->withSuccess('Nilai Berhasil diHapus!!');
    }

    public function dokumenTambahan(Request $request)
    {
        if ($request->hasFile('filenames')) {
            $file = $request->file('filenames');
            $name = $file->getClientOriginalName();
            $file->move(public_path('files'), $name);
            $file = new Dokumen();
            $file->bab = $request->bab;
            $file->elemen_penilaian = $request->ep;
            $file->ep = $request->elemen;
            $file->filenames = $name;
            $file->save();
        }
    }

    /**
     * This function is used to get permissions details by role.
     *
     * @param \Illuminate\Http\Request\Request $request
     */
    public function getPermissionByRole(Request $request)
    {
        if ($request->ajax()) {
            $role_id = $request->get('role_id');
            $rsRolePermissions = Role::where('id', $role_id)->first();
            $rolePermissions = $rsRolePermissions->permissions->pluck('display_name', 'id')->all();
            $permissions = Permission::pluck('display_name', 'id')->all();
            ksort($rolePermissions);
            ksort($permissions);
            $results['permissions'] = $permissions;
            $results['rolePermissions'] = $rolePermissions;
            $results['allPermissions'] = $rsRolePermissions->all;
            echo json_encode($results);
            exit;
        }
    }
}
