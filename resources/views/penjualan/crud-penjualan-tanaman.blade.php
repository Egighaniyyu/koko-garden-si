@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Penjualan tanaman')

@section('header')
    <h1>Form Data Penjualan Tanaman</h1>
@endsection

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route('penjualan-tanaman-tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            <a href="{{route('cetak-tanaman')}}" class="btn btn-icon icon-left btn-success" target="_blank"><i class="fas fa-print"></i> Cetak Report</a>
            <hr>
            @if (session('message'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>×</span>
                  </button>
                  {{session('message')}}
                </div>
              </div>
            @endif
            <table class="table table-striped table-bordered table-responsive">
                <tr>
                    <th>No.</th>
                    <th>ID Penjualan</th>
                    <th>ID Costumer</th>
                    <th>ID Tanaman</th>
                    <th>Nama Tanaman</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                @foreach ($penjualan_tanaman as $no => $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data -> id_transaksi}}</td>
                    <td>{{$data -> id_costumer}}</td>
                    <td>{{$data -> id_tanaman}}</td>
                    <td>{{$data -> nama_tanaman}}</td>
                    <td>{{$data -> jumlah}}</td>
                    <td>{{$data -> total}}</td>
                    <td>{{$data -> tanggal}}</td>
                    <td>
                        <a href="{{route('penjualan-tanaman-edit', $data->id_transaksi)}}" class="badge badge-warning">Edit</a>
                        <a href="#" data-id="{{$data->id_transaksi}}" data-name="{{$data->nama_tanaman}}" class="badge badge-danger swal-confirm">
                            <form action="{{route('penjualan-tanaman-delete', $data->id_transaksi)}}" id="delete{{$data->id_transaksi}}" method="POST">
                            @csrf
                            @method('delete')
                            </form>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{-- {{$kategori_perlengkapan->links()}} --}}
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
    <script>
        $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        name = e.target.dataset.name;
        swal({
            title: 'Apakah anda yakin ingin menghapus data? ' + name,
            text: 'Setelah dihapus data tidak bisa dikembalikan',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal('Poof! Your imaginary file has been deleted!', {
                icon: 'success',
                });
                $(`#delete${id}`).submit();
            } else {
                swal('Your imaginary file is safe!');
                }
            });
        });
    </script>
@endpush