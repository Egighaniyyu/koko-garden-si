@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Perlengkapan')

@section('header')
    <h1>Form Data Perlengkapan</h1>
@endsection

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route('perlengkapan-tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
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
                    <th>ID Perlengkapan</th>
                    <th>Nama Perlengkapan</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Sampul</th>
                    <th>Action</th>
                </tr>
                @foreach ($data_perlengkapan as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data -> id_perlengkapan}}</td>
                    <td>{{$data -> nama_perlengkapan}}</td>
                    <td>
                        {{$data -> kategori_perlengkapan['nama_kategori']}}
                    </td>
                    <td>{{substr($data -> deskripsi, 0, 20)}}...</td>
                    <td>{{$data -> stok}}</td>
                    <td>{{$data -> harga}}</td>
                    <td>{{$data -> sampul}}</td>
                    <td>
                        <a href="{{route('perlengkapan-detail', $data->id_perlengkapan)}}" class="badge badge-info">Detail</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{-- {{$data_tanaman->links()}} --}}
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