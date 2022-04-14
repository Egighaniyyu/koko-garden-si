@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Costumer')

@section('header')
    <h1>Form Data Costumers</h1>
@endsection

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route('costumer-tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
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
                    <th>ID Costumer</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Action</th>
                </tr>
                @foreach ($costumer as $no => $data)
                <tr>
                    <td>{{$costumer->firstItem()+$no}}</td>
                    {{-- <td>{{$no + 1}}</td> --}}
                    <td>{{$data -> id_costumer}}</td>
                    <td>{{$data -> nama}}</td>
                    <td>{{$data -> username}}</td>
                    <td>{{$data -> password}}</td>
                    <td>{{$data -> alamat}}</td>
                    <td>{{$data -> no_hp}}</td>
                    <td>
                        <a href="{{route('costumer-edit', $data->id_costumer)}}" class="badge badge-warning">Edit</a>
                        <a href="#" data-id="{{$data->id_costumer}}" data-name="{{$data->nama}}" class="badge badge-danger swal-confirm">
                            <form action="{{route('costumer-delete', $data->id_costumer)}}" id="delete{{$data->id_costumer}}" method="POST">
                            @csrf
                            @method('delete')
                            </form>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$costumer->links()}}
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