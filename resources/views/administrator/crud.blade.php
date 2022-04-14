@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Administrator')

@section('header')
    <h1>Form Data Administrator</h1>
@endsection

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route('crud-tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
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
                    <th>ID Admin</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Nomor HP</th>
                    <th>Action</th>
                </tr>
                @foreach ($administrators as $no => $data)
                <tr>
                    <td>{{$administrators->firstItem()+$no}}</td>
                    <td>{{$data -> id_administrator}}</td>
                    <td>{{$data -> nama}}</td>
                    <td>{{$data -> username}}</td>
                    <td>{{$data -> email}}</td>
                    <td>{{$data -> password}}</td>
                    <td>{{$data -> no_hp}}</td>
                    <td>
                        <a href="{{route('crud-edit', $data->id_administrator)}}" class="badge badge-warning">Edit</a>
                        <a href="#" data-id="{{$data->id_administrator}}" data-name="{{$data->nama}}" class="badge badge-danger swal-confirm">
                            <form action="{{route('crud-delete', $data->id_administrator)}}" id="delete{{$data->id_administrator}}" method="POST">
                            @csrf
                            @method('delete')
                            </form>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$administrators->links()}}
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