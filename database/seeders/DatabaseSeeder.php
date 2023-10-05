<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Petugas;
use App\Models\Anggota;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Rak;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
       Anggota::create([
        "kode_anggota" => "123456789",
        "nama_anggota" => "santoso",
        "jk_anggota" => "L",
        "jurusan_anggota" => "RPL",
        "no_telp_anggota" => "089283012918",
        "alamat_anggota" => "cawang"
       ]);

       Anggota::create([
        "kode_anggota" => "987654321",
        "nama_anggota" => "Santi",
        "jk_anggota" => "P",
        "jurusan_anggota" => "AKL",
        "no_telp_anggota" => "089283012981",
        "alamat_anggota" => "otista"
       ]);

       Petugas::create([
        "nama_petugas" => "Dadang",
        "jabatan_petugas" => "Penjaga Perpustakaan",
        "no_telp_petugas" => "089283019281",
        "alamat_petugas" => "condet"
       ]);

       Petugas::create([
        "nama_petugas" => "Dudung",
        "jabatan_petugas" => "Penjaga Perpustakaan",
        "no_telp_petugas" => "089823019281",
        "alamat_petugas" => "halim"
       ]);

       Buku::create([
        "kode_buku" => "12323",
        "judul_buku" => "Tutorial php",
        "penulis_buku" => "Bambang",
        "penerbit_buku" => "Gramedia",
        "tahun_penerbit" => "2010",
        "stok" =>1
       ]);
       Buku::create([
        "kode_buku" => "23323",
        "judul_buku" => "Tutorial Minum",
        "penulis_buku" => "Leri",
        "penerbit_buku" => "Erlangga",
        "tahun_penerbit" => "2010",
        "stok" => 30
       ]);
       Rak::create([
        "nama_rak" => "Pemrograman",
        "lokasi_rak" => "lt-13",
        "buku_id" => 1
       ]);
       Rak::create([
        "nama_rak" => "Kehidupan",
        "lokasi_rak" => "lt-13",
        "buku_id" => 2
       ]);
       Peminjaman::create([
        "tanggal_pinjam" => "2023-08-24",
        "tanggal_kembali" => "2023-08-30",
        "buku_id" => 2,
        "anggota_id" => 1,
        "petugas_id" => 2
       ]);
       Peminjaman::create([
        "tanggal_pinjam" => "2023-09-25",
        "tanggal_kembali" => "2023-10-01",
        "buku_id" => 1,
        "anggota_id" => 2,
        "petugas_id" => 1
       ]);
       Pengembalian::create([
        "tanggal_pengembalian" => "2023-09-02",
        "denda" => "10.000",
        "buku_id" => 2,
        "anggota_id" => 1,
        "petugas_id" => 2
       ]);
       Pengembalian::create([
        "tanggal_pengembalian" => "2023-10-02",
        "denda" => "20.000",
        "buku_id" => 1,
        "anggota_id" => 2,
        "petugas_id" => 1
       ]);
    }
}
