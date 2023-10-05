<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return response()->json([
            "message" => "Berhasil Mengambil Data Petugas",
            "data" => $petugas
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Petugas::create([
            "nama_petugas" => $request->nama_petugas,
            "jabatan_petugas" => $request->jabatan_petugas,
            "no_telp_petugas" => $request->no_telp_petugas,
            "alamat_petugas" => $request->alamat_petugas,
        ]);

        if(!$data) return response()->json([
            "Message" => "Gagal Menambah Petugas",
        ], 404);
        
        return response()->json([
            "Message" => "Berhasil Menambah Petugas",
            "Data" => $data
        ], 200);
    }

    public function edit(string $id)
    {

    }

    public function update(Request $request)
    {
        $data = Petugas::findOrFail($request->id);
        $updatedata = $data->update([
            "nama_petugas" => $request->nama_petugas,
            "jabatan_petugas" => $request->jabatan_petugas,
            "no_telp_petugas" => $request->no_telp_petugas,
            "alamat_petugas" => $request->alamat_petugas,
        ]);

        if(!$updatedata) return response()->json([
            "Message" => "Gagal Mengupdate Data petugas"
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data petugas",
            "data" => $updatedata
        ], 200);
    }

    public function destroy(string $id)
    {
        $dataDelete = Petugas::findOrFail($id);
        $delete = $dataDelete->delete();

        if(!$delete) return response()->json([
            "Message" => "Gagal menghapus Data petugas"
        ],400);

        return response()->json([
            "Message" => "Berhasil Menghapus Data Petugas",
        ], 200);
    }
}
