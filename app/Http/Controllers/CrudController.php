<?php

namespace App\Http\Controllers;

use App\Models\Administrators;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class CrudController extends Controller
{
    // tampil data
    public function index()
    {
        Paginator::useBootstrap();
        $data_administrator = Administrators::paginate(5);
        return view('administrator/crud', ['administrators' => $data_administrator]);
    }

    // method untuk menampilkan form tambah data
    public function tambah()
    {
        return view('administrator/crud-tambah-data');
    }

    // simpan data
    public function simpan(Request $request)
    {
        // dd($request->all());
        // cara pertama
        // DB::insert('insert into tb_administrator (id_admin, nama, username, password, no_hp) values (?, ?, ?, ?, ?)', [$request->id_admin, $request->nama, $request->username, $request->password, $request->no_hp]);

        // $this->_validation($request);
        // cara kedua
        DB::table('tb_administrator')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('crud')->with('message', 'Data berhasil disimpan');
    }

    // private function _validation(Request $request)
    // {
    //     $validation = $request->validate(
    //         [
    //             'id_administrator' => 'required|max:10|min:3'
    //         ],
    //         [
    //             'id_administrator.required' => 'Harus diisi',
    //             'id_administrator.min' => 'Digit minimal 3',
    //             'id_administrator.max' => 'Digit maximal 10'
    //         ]
    //     );
    // }

    // edit data
    public function edit($id)
    {
        $id_administrator = DB::table('tb_administrator')->where('id_administrator', $id)->first();
        return view('administrator/crud-edit-data', ['data_admin' => $id_administrator]);
    }

    // hapus data
    public function delete($id)
    {
        DB::table('tb_administrator')->where('id_administrator', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        // $this->_validation($request);
        DB::table('tb_administrator')->where('id_administrator', $id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('crud')->with('message', 'Data berhasil diupdate');
    }
}
