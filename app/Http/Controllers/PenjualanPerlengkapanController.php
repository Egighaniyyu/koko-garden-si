<?php

namespace App\Http\Controllers;

use App\Models\Costumers;
use App\Models\PenjualanPerlengkapan;
use App\Models\Perlengkapan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class PenjualanPerlengkapanController extends Controller
{
    public function index()
    {
        // Paginator::useBootstrap();
        $penjualan_perlengkapan = PenjualanPerlengkapan::all();
        return view('penjualan/crud-penjualan-perlengkapan', compact('penjualan_perlengkapan'));
        // $data_tanaman = Tanaman::all();
        // return $data_tanaman;
    }

    public function tambah()
    {
        // $kategori_tanaman = KategoriTanaman::all();
        $perlengkapan = Perlengkapan::all();
        $costumer = Costumers::all();
        $harga = DB::table('tb_perlengkapan')->select('harga')->get();
        // dd($perlengkapan);
        return view('penjualan/crud-penjualan-perlengkapan-tambah', compact('perlengkapan', 'costumer', 'harga'));
    }

    public function simpan(Request $request)
    {

        // $this->_validation($request);
        // cara kedua
        DB::table('tb_penjualan_perlengkapan')->insert([
            'id_costumer' => $request->id_costumer,
            'id_perlengkapan' => $request->id_perlengkapan,
            'nama_perlengkapan' => $request->nama_perlengkapan,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('crud-penjualan-perlengkapan')->with('message', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        DB::table('tb_penjualan_perlengkapan')->where('id_transaksi', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $perlengkapan = Perlengkapan::all();
        $costumer = Costumers::all();
        $data_penjualan = DB::table('tb_penjualan_perlengkapan')->where('id_transaksi', $id)->first();
        return view('penjualan/crud-penjualan-perlengkapan-edit', compact('data_penjualan', 'costumer', 'perlengkapan'));
    }

    public function update(Request $request, $id)
    {
        // $this->_validation($request);
        DB::table('tb_penjualan_perlengkapan')->where('id_transaksi', $id)->update([
            'id_costumer' => $request->id_costumer,
            'id_perlengkapan' => $request->id_perlengkapan,
            'nama_perlengkapan' => $request->nama_perlengkapan,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('crud-penjualan-perlengkapan')->with('message', 'Data berhasil diupdate');
    }

    public function cetak_pdf()
    {
        $penjualan_perlengkapan = PenjualanPerlengkapan::all();

        // $pdf = PDF::loadview('penjualan/cetak-penjualan-tanaman', ['penjualan_tanaman' => $penjualan_tanaman]);
        $pdf = PDF::loadview('penjualan/cetak-penjualan-perlengkapan', compact('penjualan_perlengkapan'));
        return $pdf->download('laporan-penjualan-perlengkapan-pdf');
        // return $pdf->stream("laporan-penjualan-tanaman-pdf.pdf", array("Attachment" => false));
        // exit(0);
        // return $pdf->stream();
    }
}
