<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function roles(){
        $data['title'] = 'Kelola Role';
        $roles = DB::table('roles')->get();
        
        return view('admin.roles',compact('data','roles'));
    }

    public function tambah_roles(Request $request)
    {
         // Validasi input menggunakan Laravel Validator
         $validator = Validator::make($request->all(), [
            'roles' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $roles = [
            'roles' => $request->roles,
            'created_at' => now(),
        ];

        DB::table('roles')->insert($roles);
            
        return redirect()
            ->route('roles')
            ->with('success', 'Data Role berhasil ditambahkan.');
    }

    public function edit_roles(Request $request, $id)
    {
         // Validasi input menggunakan Laravel Validator
         $validator = Validator::make($request->all(), [
            'roles' => 'required',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            // Update data di tabel roles
            Role::where('id', $id)
                ->update([
                    'roles' => $request->input('roles'),
                ]);

        
            DB::commit();

            return redirect()->back()->with('success', 'Data roles berhasil diperbarui.');
            } catch (\Exception $e) {
                DB::rollback();

                return redirect()->back()->with('error', 'Gagal memperbarui data roles.')->withInput();
            }
    }

    public function hapus_roles($id)
    {
        DB::beginTransaction();

        try {
            DB::table('roles')
                ->where('id', $id)
                ->delete();

            DB::commit();

            return redirect()
                ->route('roles')
                ->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->route('roles')
                ->with('error', 'Gagal menghapus data.');
        }
    }
}
