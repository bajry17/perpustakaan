<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function index()
    {
        $rak = Rak::all();
        return response()->json([
            "message" => "Berhasil Mengambil Data Rak",
            "data" => $rak
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Rak::create([
            "nama_rak" => $request->nama_rak,
            "lokasi_rak" => $request->lokasi_rak,
            "buku_id" => $request->buku_id,
        ]);

        if(!$data) return response()->json([
            "Message" => "Gagal Menambah Rak",
        ], 404);
        
        return response()->json([
            "Message" => "Berhasil Menambah Rak",
            "Data" => $data
        ], 200);
    }

    public function edit(string $id)
    {

    }

    public function update(Request $request)
    {
        $data = Rak::findOrFail($request->id);
        $updatedata = $data->update([
            "nama_rak" => $request->nama_rak,
            "lokasi_rak" => $request->lokasi_rak,
            "buku_id" => $request->buku_id,
        ]);

        if(!$updatedata) return response()->json([
            "Message" => "Gagal Mengupdate Data Rak"
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data Rak",
            "data" => $updatedata
        ], 200);
    }

    public function destroy(string $id)
    {
        $dataDelete = Rak::findOrFail($id);
        $delete = $dataDelete->delete();

        if(!$delete) return response()->json([
            "Message" => "Gagal menghapus Data Rak"
        ],400);

        return response()->json([
            "Message" => "Berhasil Menghapus Data Rak",
        ], 200);
    }
}
