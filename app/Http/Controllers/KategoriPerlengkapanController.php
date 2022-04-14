<?php

namespace App\Http\Controllers;

use App\Models\KategoriPerlengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class KategoriPerlengkapanController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $data_kategori_perlengkapan = KategoriPerlengkapan::paginate(5);
        return view('kategori/crud-kategori-perlengkapan', ['kategori_perlengkapan' => $data_kategori_perlengkapan]);
    }

    public function tambah()
    {
        return view('kategori/crud-kategori-perlengkapan-tambah');
    }

    public function simpan(Request $request)
    {
        // cara kedua
        DB::table('tb_kategori_perlengkapan')->insert([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('crud-kategori-perlengkapan')->with('message', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        DB::table('tb_kategori_perlengkapan')->where('id_kategori', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $id_kategori_perlengkapan = DB::table('tb_kategori_perlengkapan')->where('id_kategori', $id)->first();
        return view('kategori/crud-kategori-perlengkapan-edit', ['data_kategori_perlengkapan' => $id_kategori_perlengkapan]);
    }

    public function update(Request $request, $id)
    {
        DB::table('tb_kategori_perlengkapan')->where('id_kategori', $id)->update([
            // 'id_transaksi' => $request->id_transaksi,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('crud-kategori-perlengkapan')->with('message', 'Data berhasil diupdate');
    }
}
