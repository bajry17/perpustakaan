<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $book = Buku::all();
        return response()->json([
            "message" => "Berhasil Mengambil Data Buku",
            "data" => $book
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Buku::create([
            "kode_buku" => $request->kode_buku,
            "judul_buku" => $request->judul_buku,
            "penulis_buku" => $request->penulis_buku,
            "penerbit_buku" => $request->penerbit_buku,
            "tahun_penerbit" => $request->tahun_penerbit,
            "stok" => $request->stok
        ]);

        if(!$data) return response()->json([
            "Message" => "Gagal Menambah Buku",
        ], 404);
        
        return response()->json([
            "Message" => "Berhasil Menambah Buku",
            "Data" => $data
        ], 200);
    }

    public function edit(string $id)
    {

    }

    public function update(Request $request)
    {
        $data = Buku::findOrFail($request->id);
        $updatedata = $data->update([
            "kode_buku" => $request->kode_buku,
            "judul_buku" => $request->judul_buku,
            "penulis_buku" => $request->penulis_buku,
            "penerbit_buku" => $request->penerbit_buku,
            "tahun_penerbit" => $request->tahun_penerbit,
            "stok" => $request->stok
        ]);

        if(!$updatedata) return response()->json([
            "Message" => "Gagal Mengupdate Data"
        ],500);

        return response()->json([
            "Message" => "Berhasil Mengupdate Data",
            "data" => $updatedata
        ], 200);
    }

    public function destroy(string $id)
    {
        $dataDelete = Buku::findOrFail($id);
        $delete = $dataDelete->delete();

        if(!$delete) return response()->json([
            "Message" => "Gagal menghapus Data"
        ],400);

        return response()->json([
            "Message" => "Berhasil Menghapus Data",
        ], 200);
    }
}
