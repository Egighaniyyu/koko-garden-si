@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Kategori Perlengkapan')

@section('header')
    <h1>Form Data Kategori Perlengkapan</h1>
@endsection

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route('kategori-perlengkapan-tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
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
                    <th>ID Kategori Perlengkapan</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
                @foreach ($kategori_perlengkapan as $no => $data)
                <tr>
                    <td>{{$kategori_perlengkapan->firstItem()+$no}}</td>
                    <td>{{$data -> id_kategori}}</td>
                    <td>{{$data -> nama_kategori}}</td>
                    <td>
                        <a href="{{route('kategori-perlengkapan-edit', $data->id_kategori)}}" class="badge badge-warning">Edit</a>
                        <a href="#" data-id="{{$data->id_kategori}}" data-name="{{$data->nama_kategori}}" class="badge badge-danger swal-confirm">
                            <form action="{{route('kategori-perlengkapan-delete', $data->id_kategori)}}" id="delete{{$data->id_kategori}}" method="POST">
                            @csrf
                            @method('delete')
                            </form>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$kategori_perlengkapan->links()}}
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