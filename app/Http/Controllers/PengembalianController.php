<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::all();
        return response()->json([
            "message" => "Berhasil Mengambil Data Pengembalian",
            "data" => $pengembalian
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Pengembalian::create([
            "tanggal_pengembalian" => $request->tanggal_pengembalian,
            "denda" => $request->denda,
            "buku_id" => $request->buku_id,
            "anggota_id" => $request->anggota_id,
            "petugas_id" => $request->petugas_id,
        ]);

        if(!$data) return response()->json([
            "Message" => "Gagal Menambah Pengembalian",
        ], 404);
        
        return response()->json([
            "Message" => "Berhasil Menambah Pengembalian",
            "Data" => $data
        ], 200);
    }

    public function edit(string $id)
    {

    }

    public function update(Request $request)
    {
        $data = Pengembalian::findOrFail($request->id);
        $updatedata = $data->update([
            "tanggal_pengembalian" => $request->tanggal_pengembalian,
            "denda" => $request->denda,
            "buku_id" => $request->buku_id,
            "anggota_id" => $request->anggota_id,
            "petugas_id" => $request->petugas_id,
        ]);

        if(!$updatedata) return response()->json([
            "Message" => "Gagal Mengupdate Data Pengembalian"
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data Pengembalian",
            "data" => $updatedata
        ], 200);
    }

    public function destroy(string $id)
    {
        $dataDelete = Pengembalian::findOrFail($id);
        $delete = $dataDelete->delete();

        if(!$delete) return response()->json([
            "Message" => "Gagal menghapus Data Pengembalian"
        ],400);

        return response()->json([
            "Message" => "Berhasil Menghapus Data Pengembalian",
        ], 200);
    }
}
