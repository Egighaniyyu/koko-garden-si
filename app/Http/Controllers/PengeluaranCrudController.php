<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PengeluaranCrudController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $data_pengeluaran = Pengeluaran::paginate(5);
        return view('pengeluaran/crud-pengeluaran', ['pengeluaran' => $data_pengeluaran]);
    }

    public function tambah()
    {
        return view('pengeluaran/crud-pengeluaran-tambah');
    }

    public function simpan(Request $request)
    {
        // cara kedua
        DB::table('tb_pengeluaran')->insert([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('crud-pengeluaran')->with('message', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        DB::table('tb_pengeluaran')->where('id_transaksi', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $id_pengeluaran = DB::table('tb_pengeluaran')->where('id_transaksi', $id)->first();
        return view('pengeluaran/crud-pengeluaran-edit', ['data_pengeluaran' => $id_pengeluaran]);
    }

    public function update(Request $request, $id)
    {
        DB::table('tb_pengeluaran')->where('id_transaksi', $id)->update([
            // 'id_transaksi' => $request->id_transaksi,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('crud-pengeluaran')->with('message', 'Data berhasil diupdate');
    }
}
