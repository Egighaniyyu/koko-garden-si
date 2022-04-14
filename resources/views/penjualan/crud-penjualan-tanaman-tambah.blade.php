@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Penjualan Tanaman')

{{-- @push('top-page-scripts')
<script>

$( "#id_costumer" ).autocomplete({
      source: [
                'Apple',
                'Banana',
                'Orange'
            ],
    });
</script>
@endpush --}}

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('penjualan-tanaman-simpan')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ID Costumer</label>
                                    <select class="form-control" name="id_costumer">
                                        @foreach ($costumer as $cs)
                                            <option value="{{$cs -> id_costumer}}">{{$cs -> id_costumer}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ID Tanaman</label>
                                    <select class="form-control" name="id_tanaman" id="id_tanaman" onchange="autofill()">
                                        @foreach ($tanaman as $t)
                                            <option value="{{$t -> id_tanaman}}">{{$t -> id_tanaman}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Tanaman</label>
                                    <input type="text" name="nama_tanaman" class="form-control" id="nama_tanaman">
                                    {{-- <textarea class="form-control" name="deskripsi"></textarea> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control" id="jumlah" onkeyup="hit_total()">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" name="total" class="form-control" id="total">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                  <input type="date" name="tanggal" class="form-control">
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
            let id_tanaman = $("#id_tanaman").val();
            $.ajax({
                url : '../../autofill-tanaman.php',
                data : 'id_tanaman='+id_tanaman,
                success : function(data){
                let json = data,
                obj = JSON.parse(json);
                $('#nama_tanaman').val(obj.nama);
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