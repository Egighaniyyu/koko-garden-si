@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Tanaman')

@section('header')
    <h1>Form Data Tanaman</h1>
@endsection

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <a href="{{route('tanaman-edit', $data_tanaman->id_tanaman)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-edit"></i> Edit</a>
    <a href="#" data-id="{{$data_tanaman->id_tanaman}}" data-name="{{$data_tanaman->nama_tanaman}}" class="btn btn-icon icon-left btn-danger swal-confirm"><i class="far fa-trash-alt"></i> <form action="{{route('tanaman-delete', $data_tanaman->id_tanaman)}}" id="delete{{$data_tanaman->id_tanaman}}" method="POST" style="display: inline">
        @csrf
        @method('delete')
        </form>Delete</a>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            {{-- <a href="{{route('tanaman-tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a> --}}
            {{-- <a href="{{route('tanaman-edit', $data_tanaman->id_tanaman)}}" class="badge badge-warning">Edit</a> --}}
            {{-- <a href="#" data-id="{{$data_tanaman->id_tanaman}}" data-name="{{$data_tanaman->nama_tanaman}}" class="badge badge-danger swal-confirm">
                <form action="{{route('tanaman-delete', $data_tanaman->id_tanaman)}}" id="delete{{$data_tanaman->id_tanaman}}" method="POST">
                @csrf
                @method('delete')
                </form>
                Delete
            </a> --}}
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
                {{-- <tr>
                    <th>No.</th>
                    <th>ID Tanaman</th>
                    <th>Nama Tanaman</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Sampul</th>
                    <th>Action</th>
                </tr>
                @foreach ($data_tanaman as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data -> id_tanaman}}</td>
                    <td>{{$data -> nama_tanaman}}</td>
                    <td>
                        {{$data -> kategori_tanaman['nama_kategori']}}
                    </td>
                    <td>{{$data -> deskripsi}}</td>
                    <td>{{$data -> stok}}</td>
                    <td>{{$data -> harga}}</td>
                    <td>{{$data -> sampul}}</td>
                    <td>
                        <a href="#" class="badge badge-info">Detail</a>
                        <a href="{{route('tanaman-edit', $data->id_tanaman)}}" class="badge badge-warning">Edit</a>
                        <a href="#" data-id="{{$data->id_tanaman}}" data-name="{{$data->nama_tanaman}}" class="badge badge-danger swal-confirm">
                            <form action="{{route('tanaman-delete', $data->id_tanaman)}}" id="delete{{$data->id_tanaman}}" method="POST">
                            @csrf
                            @method('delete')
                            </form>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach --}}
                <tr>
                    <td width="20%">ID Tanaman : </td>
                    <td>{{$data_tanaman -> id_tanaman}}</td>
                </tr>
                <tr>
                    <td>Nama Tanaman : </td>
                    <td>{{$data_tanaman -> nama_tanaman}}</td>
                </tr>
                <tr>
                    <td>Kategori : </td>
                    <td>{{$data_tanaman->kategori_tanaman->nama_kategori}}</td>
                </tr>
                <tr>
                    <td>Deskripsi : </td>
                    <td>{{$data_tanaman -> deskripsi}}</td>
                </tr>
                <tr>
                    <td>Stok : </td>
                    <td>{{$data_tanaman -> stok}}</td>
                </tr>
                <tr>
                    <td>Harga : </td>
                    <td>{{$data_tanaman -> harga}}</td>
                </tr>
                <tr>
                    <td>Sampul : </td>
                    <td><img width="50%" src="{{ url('/gambar_tanaman/'.$data_tanaman->sampul) }}"></td>
                    {{-- <td>{{$data_tanaman -> sampul}}</td> --}}
                </tr>
                {{-- @dump($data_tanaman->kategori_tanaman->nama_kategori) --}}
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