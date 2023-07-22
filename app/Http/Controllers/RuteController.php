<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RuteController extends Controller
{
    public function rute(){
        $data['title'] = 'Kelola Rute';
        $rute = DB::table('rute')->get();
        
        return view('admin.rute',compact('data','rute'));
    }

    public function tambah_rute(Request $request)
    {
         // Validasi input menggunakan Laravel Validator
         $validator = Validator::make($request->all(), [
            'keberangkatan' => 'required',
            'tujuan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $rute = [
            'keberangkatan' => $request->keberangkatan,
            'tujuan' => $request->tujuan,
            'created_at' => now(),
        ];

        DB::table('rute')->insert($rute);
            
        return redirect()
            ->route('rute')
            ->with('success', 'Data Role berhasil ditambahkan.');
    }

    public function edit_rute(Request $request, $id)
    {
         // Validasi input menggunakan Laravel Validator
         $validator = Validator::make($request->all(), [
            'keberangkatan' => $request->keberangkatan,
            'tujuan' => $request->tujuan,
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            // Update data di tabel roles
            Rute::where('id', $id)
                ->update([
                    'keberangkatan' => $request->input('keberangkatan'),
                    'tujuan' => $request->input('tujuan'),
                ]);

        
            DB::commit();

            return redirect()->back()->with('success', 'Data roles berhasil diperbarui.');
            } catch (\Exception $e) {
                DB::rollback();

                return redirect()->back()->with('error', 'Gagal memperbarui data roles.')->withInput();
            }
    }

    public function hapus_rute($id)
    {
        DB::beginTransaction();

        try {
            DB::table('rute')
                ->where('id', $id)
                ->delete();

            DB::commit();

            return redirect()
                ->route('rute')
                ->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->route('rute')
                ->with('error', 'Gagal menghapus data.');
        }
    }

}
