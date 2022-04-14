<?php

namespace App\Http\Controllers;

use App\Models\Costumers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class CostumerCrudController extends Controller
{
    public function index()
    {
        Paginator::useBootstrap();
        $data_costumer = Costumers::paginate(5);
        return view('costumer/crud-costumer', ['costumer' => $data_costumer]);
    }

    public function tambah()
    {
        return view('costumer/crud-tambah-costumer');
    }

    public function simpan(Request $request)
    {

        // $this->_validation($request);
        // cara kedua
        DB::table('tb_costumer')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('crud-costumer')->with('message', 'Data berhasil disimpan');
    }

    // private function _validation(Request $request)
    // {
    //     $validation = $request->validate(
    //         [
    //             'id_costumer' => 'required|max:10|min:3'
    //         ],
    //         [
    //             'id_costumer.required' => 'Harus diisi',
    //             'id_costumer.min' => 'Digit minimal 3',
    //             'id_costumer.max' => 'Digit maximal 10'
    //         ]
    //     );
    // }

    public function delete($id)
    {
        DB::table('tb_costumer')->where('id_costumer', $id)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $id_costumer = DB::table('tb_costumer')->where('id_costumer', $id)->first();
        return view('costumer/crud-edit-costumer', ['data_costumer' => $id_costumer]);
    }

    public function update(Request $request, $id)
    {
        // $this->_validation($request);
        DB::table('tb_costumer')->where('id_costumer', $id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
        return redirect()->route('crud-costumer')->with('message', 'Data berhasil diupdate');
    }
}
