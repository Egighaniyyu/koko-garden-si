<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use App\Models\KategoriPerlengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use File;

class PerlengkapanController extends Controller
{
    public function index()
    {
        // Paginator::useBootstrap();
        $data_perlengkapan = Perlengkapan::all();
        return view('perlengkapan/crud-perlengkapan', compact('data_perlengkapan'));
        // $data_tanaman = Tanaman::all();
        // return $data_tanaman;
    }

    public function tambah()
    {
        $kategori_perlengkapan = KategoriPerlengkapan::all();
        $sampul  = Perlengkapan::get();
        return view('perlengkapan/crud-perlengkapan-tambah', compact('kategori_perlengkapan', 'sampul'));
    }

    public function simpan(Request $request)
    {
        // $sampul  = Tanaman::get();
        // $this->validate($request, [
        //     'sampul' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('sampul');
        // $nama_file = uniqid() . "_" . $file->getClientOriginalExtension();
        $nama_file = $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_perlengkapan';
        $file->move($tujuan_upload, $nama_file);


        // cara kedua
        DB::table('tb_perlengkapan')->insert([
            'nama_perlengkapan' => $request->nama_perlengkapan,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'sampul' => $nama_file,
        ]);
        // dd($request->all());
        return redirect()->route('crud-perlengkapan')->with('message', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        // $gambar = Tanaman::where('id_tanaman', $id)->first();
        // DB::table('tb_tanaman')->where('id_tanaman', $id)->delete();
        // File::delete('data_file/' . $gambar->file);
        $data_perlengkapan = Perlengkapan::where('id_perlengkapan', $id)->first();
        File::delete('data_file/' . $data_perlengkapan->sampul);
        // hapus data
        // dd('data_file/' . $data_tanaman->sampul);
        Perlengkapan::where('id_perlengkapan', $id)->delete();
        return redirect()->route('crud-perlengkapan')->with('message', 'Data berhasil dihapus');
        // return redirect()->back($headers = ['data-tanaman'])->with('message', 'Data berhasil dihapus');
    }


    public function edit($id)
    {
        $sampul  = Perlengkapan::get();
        $kategori_perlengkapan = KategoriPerlengkapan::all();
        $data_perlengkapan = DB::table('tb_perlengkapan')->where('id_perlengkapan', $id)->first();
        // dd($id_perlengkapan);
        return view('perlengkapan/crud-perlengkapan-edit', compact('data_perlengkapan', 'kategori_perlengkapan', 'sampul'));
    }

    public function update(Request $request, $id)
    {
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('sampul');
        // $nama_file = uniqid() . "_" . $file->getClientOriginalExtension();
        $nama_file = $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_perlengkapan';
        $file->move($tujuan_upload, $nama_file);

        DB::table('tb_perlengkapan')->where('id_perlengkapan', $id)->update([
            'nama_perlengkapan' => $request->nama_perlengkapan,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'sampul' => $nama_file,
        ]);
        return redirect()->route('crud-perlengkapan')->with('message', 'Data berhasil diupdate');
    }

    public function detail($id)
    {
        // $data_tanaman = Tanaman::all();
        // return view('tanaman/crud-tanaman-detail', compact('data_tanaman'));
        // $kategori_tanaman = KategoriTanaman::all();
        $data_perlengkapan = Perlengkapan::where('id_perlengkapan', $id)->first();
        // dd($kategori_tanaman);

        // dd($data_tanaman->kategori_tanaman->nama_kategori);

        return view('perlengkapan/crud-perlengkapan-detail', compact('data_perlengkapan'));
    }
}
