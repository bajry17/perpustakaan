<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return response()->json([
            "message" => "Berhasil Mengambil Data Anggota",
            "data" => $anggota
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Anggota::create([
            "kode_anggota" => $request->kode_anggota,
            "nama_anggota" => $request->nama_anggota,
            "penulis_buku" => $request->penulis_buku,
            "jurusan_anggota" => $request->jurusan_anggota,
            "no_telp_anggota" => $request->no_telp_anggota,
            "alamat_anggota" => $request->alamat_anggota
        ]);

        if(!$data) return response()->json([
            "Message" => "Gagal Menambah Anggota",
        ], 404);
        
        return response()->json([
            "Message" => "Berhasil Menambah Anggota",
            "Data" => $data
        ], 200);
    }

    public function edit(string $id)
    {

    }

    public function update(Request $request)
    {
        $data = Anggota::findOrFail($request->id);
        $updatedata = $data->update([
            "kode_anggota" => $request->kode_anggota,
            "nama_anggota" => $request->nama_anggota,
            "penulis_buku" => $request->penulis_buku,
            "jurusan_anggota" => $request->jurusan_anggota,
            "no_telp_anggota" => $request->no_telp_anggota,
            "alamat_anggota" => $request->alamat_anggota
        ]);

        if(!$updatedata) return response()->json([
            "Message" => "Gagal Mengupdate Data Anggota"
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data Anggota",
            "data" => $updatedata
        ], 200);
    }

    public function destroy(string $id)
    {
        $dataDelete = Anggota::findOrFail($id);
        $delete = $dataDelete->delete();

        if(!$delete) return response()->json([
            "Message" => "Gagal menghapus Data Anggota"
        ],400);

        return response()->json([
            "Message" => "Berhasil Menghapus Data Anggota",
        ], 200);
    }
}
