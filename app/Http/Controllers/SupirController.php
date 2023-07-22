<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SupirController extends Controller
{
    public function supir(){

        $data['title'] = 'Kelola Supir';
        $supir = DB::table('users')
        ->join('roles','roles.id','=','users.role_id')
        ->select('users.*','roles.roles')
        ->where('users.role_id','=','3')
        ->get();
        return view('admin.supir',compact('data','supir'));
    }
    public function tambah_supir(Request $request)
    {
        // Validasi input menggunakan Laravel Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $supir = [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => bcrypt('travel123'),
            'role_id' => '3',
            'created_at' => now(),
        ];

        DB::table('users')->insert($supir);
            
        return redirect()
        ->route('supir')
        ->with('success', 'Data supir berhasil ditambahkan.');
        
    }

    public function edit_supir(Request $request, $id)
    {
          // Validasi input menggunakan Laravel Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            // Update data di tabel users
            User::where('id', $id)
                ->update([
                    'nama' => $request->input('nama'),
                    'no_hp' => $request->input('no_hp'),
                    'email' => $request->input('email'),
                ]);

        
            DB::commit();

            return redirect()->back()->with('success', 'Data supir berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Gagal memperbarui data supir.')->withInput();
        }
    }

    public function hapus_supir($id)
    {
        DB::beginTransaction();

        try {
            DB::table('users')
                ->where('id', $id)
                ->delete();

            DB::commit();

            return redirect()
                ->route('supir')
                ->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->route('supir')
                ->with('error', 'Gagal menghapus data.');
        }
    }
}
