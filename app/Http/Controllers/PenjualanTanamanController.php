<?php

namespace App\Http\Controllers;

use App\Models\Costumers;
use App\Models\PenjualanTanaman;
use App\Models\Tanaman;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class PenjualanTanamanController extends Controller
{
    public function index()
    {
        // Paginator::useBootstrap();
        $penjualan_tanaman = PenjualanTanaman::all();
        return view('penjualan/crud-penjualan-tanaman', compact('penjualan_tanaman'));
        // $data_tanaman = Tanaman::all();
        // return $data_tanaman;
    }

    public function tambah()
    {
        // $kategori_tanaman = KategoriTanaman::all();
        $tanaman = Tanaman::all();
        $costumer = Costumers::all();
        $harga = DB::table('tb_tanaman')->select('harga')->get();
        // dd($harga);
        return view('penjualan/crud-penjualan-tanaman-tambah', compact('tanaman', 'costumer', 'harga'));
    }

    public function simpan(Request $request)
    {

        // $this->_validation($request);
        // cara kedua
        DB::table('tb_penjualan_tanaman')->insert([
            'id_costumer' => $request->id_costumer,
            'id_tanaman' => $request->id_tanaman,
            'nama_tanaman' => $request->nama_tanaman,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('crud-penjualan-tanaman')->with('message', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        DB::table('tb_penjualan_tanaman')->where('id_transaksi', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $tanaman = Tanaman::all();
        $costumer = Costumers::all();
        $data_penjualan = DB::table('tb_penjualan_tanaman')->where('id_transaksi', $id)->first();
        return view('penjualan/crud-penjualan-tanaman-edit', compact('data_penjualan', 'costumer', 'tanaman'));
    }

    public function update(Request $request, $id)
    {
        // $this->_validation($request);
        DB::table('tb_penjualan_tanaman')->where('id_transaksi', $id)->update([
            'id_costumer' => $request->id_costumer,
            'id_tanaman' => $request->id_tanaman,
            'nama_tanaman' => $request->nama_tanaman,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('crud-penjualan-tanaman')->with('message', 'Data berhasil diupdate');
    }

    public function cetak_pdf()
    {
        $penjualan_tanaman = PenjualanTanaman::all();

        // $pdf = PDF::loadview('penjualan/cetak-penjualan-tanaman', ['penjualan_tanaman' => $penjualan_tanaman]);
        $pdf = PDF::loadview('penjualan/cetak-penjualan-tanaman', compact('penjualan_tanaman'));
        return $pdf->download('laporan-penjualan-tanaman-pdf');
        // return $pdf->stream("laporan-penjualan-tanaman-pdf.pdf", array("Attachment" => false));
        // exit(0);
        // return $pdf->stream();
    }
}
