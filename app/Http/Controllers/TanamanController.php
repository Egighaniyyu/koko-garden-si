<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use App\Models\KategoriTanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use File;

class TanamanController extends Controller
{
    public function index()
    {
        // Paginator::useBootstrap();
        $data_tanaman = Tanaman::all();
        return view('tanaman/crud-tanaman', compact('data_tanaman'));
        // $data_tanaman = Tanaman::all();
        // return $data_tanaman;
    }

    public function tambah()
    {
        $kategori_tanaman = KategoriTanaman::all();
        $sampul  = Tanaman::get();
        return view('tanaman/crud-tanaman-tambah', compact('kategori_tanaman', 'sampul'));
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
        $tujuan_upload = 'gambar_tanaman';
        $file->move($tujuan_upload, $nama_file);

        // Tanaman::create([
        //     'nama_tanaman' => $request->nama_tanaman,
        //     'id_kategori' => $request->id_kategori,
        //     'deskripsi' => $request->deskripsi,
        //     'stok' => $request->stok,
        //     'harga' => $request->harga,
        //     'sampul' => $nama_file,
        // ]);
        // cara kedua
        DB::table('tb_tanaman')->insert([
            'nama_tanaman' => $request->nama_tanaman,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'sampul' => $nama_file,
        ]);
        // dd($request->all());
        return redirect()->route('crud-tanaman')->with('message', 'Data berhasil disimpan');
    }

    public function delete($id)
    {
        // $gambar = Tanaman::where('id_tanaman', $id)->first();
        // DB::table('tb_tanaman')->where('id_tanaman', $id)->delete();
        // File::delete('data_file/' . $gambar->file);
        $data_tanaman = Tanaman::where('id_tanaman', $id)->first();
        File::delete('data_file/' . $data_tanaman->sampul);
        // hapus data
        // dd('data_file/' . $data_tanaman->sampul);
        Tanaman::where('id_tanaman', $id)->delete();
        return redirect()->route('crud-tanaman')->with('message', 'Data berhasil dihapus');
        // return redirect()->back($headers = ['data-tanaman'])->with('message', 'Data berhasil dihapus');
    }


    public function edit($id)
    {
        $sampul  = Tanaman::get();
        $kategori_tanaman = KategoriTanaman::all();
        $data_tanaman = DB::table('tb_tanaman')->where('id_tanaman', $id)->first();
        // dd($id_tanaman);
        return view('tanaman/crud-tanaman-edit', compact('data_tanaman', 'kategori_tanaman', 'sampul'));
    }

    public function update(Request $request, $id)
    {
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('sampul');
        // $nama_file = uniqid() . "_" . $file->getClientOriginalExtension();
        $nama_file = $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_tanaman';
        $file->move($tujuan_upload, $nama_file);

        DB::table('tb_tanaman')->where('id_tanaman', $id)->update([
            'nama_tanaman' => $request->nama_tanaman,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'sampul' => $nama_file,
        ]);
        return redirect()->route('crud-tanaman')->with('message', 'Data berhasil diupdate');
    }

    public function detail($id)
    {
        // $data_tanaman = Tanaman::all();
        // return view('tanaman/crud-tanaman-detail', compact('data_tanaman'));
        // $kategori_tanaman = KategoriTanaman::all();
        $data_tanaman = Tanaman::where('id_tanaman', $id)->first();
        // dd($kategori_tanaman);

        // dd($data_tanaman->kategori_tanaman->nama_kategori);

        return view('tanaman/crud-tanaman-detail', compact('data_tanaman'));
    }
}
