<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return response()->json([
            "message" => "Berhasil Mengambil Data Peminjaman",
            "data" => $peminjaman
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Peminjaman::create([
            "tanggal_pinjam" => $request->tanggal_pinjam,
            "tanggal_kembali" => $request->tanggal_kembali,
            "buku_id" => $request->buku_id,
            "anggota_id" => $request->anggota_id,
            "petugas_id" => $request->petugas_id,
        ]);

        if(!$data) return response()->json([
            "Message" => "Gagal Menambah Peminjaman",
        ], 404);
        
        return response()->json([
            "Message" => "Berhasil Menambah Peminjaman",
            "Data" => $data
        ], 200);
    }

    public function edit(string $id)
    {

    }

    public function update(Request $request)
    {
        $data = Peminjaman::findOrFail($request->id);
        $updatedata = $data->update([
            "tanggal_pinjam" => $request->tanggal_pinjam,
            "tanggal_kembali" => $request->tanggal_kembali,
            "buku_id" => $request->buku_id,
            "anggota_id" => $request->anggota_id,
            "petugas_id" => $request->petugas_id,
        ]);

        if(!$updatedata) return response()->json([
            "Message" => "Gagal Mengupdate Data Peminjaman"
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data Peminjaman",
            "data" => $updatedata
        ], 200);
    }

    public function destroy(string $id)
    {
        $dataDelete = Peminjaman::findOrFail($id);
        $delete = $dataDelete->delete();

        if(!$delete) return response()->json([
            "Message" => "Gagal menghapus Data Peminjaman"
        ],400);

        return response()->json([
            "Message" => "Berhasil Menghapus Data Peminjaman",
        ], 200);
    }
}
