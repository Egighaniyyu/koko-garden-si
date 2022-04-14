@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Penjualan Perlengkapan')

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('penjualan-perlengkapan-update', $data_penjualan->id_transaksi)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ID Costumer</label>
                                    <select class="form-control" name="id_costumer">
                                        <option>{{$costumer[$data_penjualan->id_costumer-1]->id_costumer}}</option>
                                        @if (old('id_costumer'))
                                            value="{{old('id_costumer')}}"  
                                        @else
                                            @foreach ($costumer as $cs)
                                                <option value="{{$cs -> id_costumer}}">{{$cs -> id_costumer}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ID Perlengkapan</label>
                                    <select class="form-control" name="id_perlengkapan" id="id_perlengkapan" onchange="autofill()">
                                        <option>{{$perlengkapan[$data_penjualan->id_perlengkapan-1]->id_perlengkapan}}</option>
                                        @if (old('id_perlengkapan'))
                                            value="{{old('id_perlengkapan')}}"  
                                        @else
                                            @foreach ($perlengkapan as $p)
                                                <option value="{{$p -> id_perlengkapan}}">{{$p -> id_perlengkapan}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Perlengkapan</label>
                                    <input type="text" name="nama_perlengkapan" 
                                    @if (old('nama_perlengkapan'))
                                        value="{{old('nama_perlengkapan')}}"  
                                    @else
                                        value="{{$data_penjualan->nama_perlengkapan}}"    
                                    @endif
                                    class="form-control" id="nama_perlengkapan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" 
                                    @if (old('jumlah'))
                                        value="{{old('jumlah')}}"  
                                    @else
                                        value="{{$data_penjualan->jumlah}}"    
                                    @endif
                                    class="form-control" id="jumlah" onkeyup="hit_total()">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" name="total" 
                                    @if (old('total'))
                                        value="{{old('total')}}"  
                                    @else
                                        value="{{$data_penjualan->total}}"    
                                    @endif
                                    class="form-control" id="total" id="total">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="text" name="tanggal" 
                                    @if (old('tanggal'))
                                        value="{{old('tanggal')}}"  
                                    @else
                                        value="{{$data_penjualan->tanggal}}"    
                                    @endif
                                    class="form-control">
                                </div>
                            </div>
                            </div>
                        <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    <script>
        function autofill(){
            let id_perlengkapan = $("#id_perlengkapan").val();
            $.ajax({
                url : '../../../autofill-perlengkapan.php',
                data : 'id_perlengkapan='+id_perlengkapan,
                success : function(data){
                let json = data,
                obj = JSON.parse(json);
                $('#nama_perlengkapan').val(obj.nama);
                $('#total').val(obj.harga);
            }
            });
        }

        function hit_total(){
            let jumlah = $("#jumlah").val();
            let total = $("#total").val();
            let tot_harga = jumlah * total;
            $("#total").val(tot_harga);
            
        }
        // var mysql = require('mysql');

        // var con = mysql.createConnection({
        // host: "localhost",
        // user: "root",
        // password: "",
        // database: "db_koko-garden"
        // });

        // function autofill() {
            
        //     let id_tanaman = $("#id_tanaman").val();
        //     // console.log(id_tanaman);
        //     con.connect(function(err) {
        //     if (err) throw err;
        //     con.query(`SELECT nama_tanaman FROM tb_tanaman WHERE id_tanaman = '${id_tanaman}'`, function (err, result) {
        //         if (err) throw err;
        //         console.log(result);
        //     });
        //     });
        // }
    </script>
@endpush