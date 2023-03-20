<?php

namespace App\Http\Controllers\Backend;

use App\Dokumen;
use App\Models\Auth\Role;
use Illuminate\Http\Request;
use App\Models\Auth\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        if (! auth()->user()) {
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
        $elemen = $_GET['ep'];

        $nilai = DB::table('dokumen_akreditasi')->where('ep', $elemen)->update([
            'nilai' => $_GET['nilai'],
        ]);

        $nilai_ep = DB::table('elemen_penilaian')->where('ep', $elemen)->update([
            'nilai_ep' => $_GET['nilai'],
        ]);

        return $_GET['nilai'];
    }

    public function hapusDokumen(Request $request)
    {
        // $id = $request->data;
        $id = $request->id;

        $dokumen = Dokumen::find($id);
        $dokumen->delete();

        return $dokumen;
    }

    public function dokumenTambahan(Request $request)
    {
        request()->validate([
            'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
        ]);

        if ($files = $request->file('file')) {
            //store file into document folder
            $file = $request->file->store('public/documents');

            //store your file into database
            //$document = new Document();
            //$document->title = $file;
            //$document->save();

            return Response()->json([
                'success' => true,
                'file' => $file,
            ]);
        }

        return Response()->json([
            'success' => false,
            'file' => '',
        ]);
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
