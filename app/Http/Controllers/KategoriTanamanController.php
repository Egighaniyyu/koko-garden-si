<?php

namespace App\Http\Controllers;

use App\Models\KategoriTanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class KategoriTanamanController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $data_kategori_tanaman = KategoriTanaman::paginate(5);
        return view('kategori/crud-kategori-tanaman', ['kategori_tanaman' => $data_kategori_tanaman]);
    }

    public function tambah()
    {
        return view('kategori/crud-kategori-tanaman-tambah');
    }

    public function simpan(Request $request)
    {
        // cara kedua
        DB::table('tb_kategori_tanaman')->insert([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('crud-kategori-tanaman')->with('message', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        DB::table('tb_kategori_tanaman')->where('id_kategori', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $id_kategori_tanaman = DB::table('tb_kategori_tanaman')->where('id_kategori', $id)->first();
        return view('kategori/crud-kategori-tanaman-edit', ['data_kategori_tanaman' => $id_kategori_tanaman]);
    }

    public function update(Request $request, $id)
    {
        DB::table('tb_kategori_tanaman')->where('id_kategori', $id)->update([
            // 'id_transaksi' => $request->id_transaksi,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('crud-kategori-tanaman')->with('message', 'Data berhasil diupdate');
    }
}
