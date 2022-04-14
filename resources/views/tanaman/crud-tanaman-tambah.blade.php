@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Tanaman')

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tanaman-simpan')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Tanaman</label>
                                    <input type="text" name="nama_tanaman" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="id_kategori">
                                        @foreach ($kategori_tanaman as $kt)
                                            <option value="{{$kt -> id_kategori}}">{{$kt -> nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control">
                                    {{-- <textarea class="form-control" name="deskripsi"></textarea> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stok" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sampul</label>
                                    <input type="file" class="form-control" name="sampul">
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

@push('page-scripts')
    {{-- <script>alert(123)</script> --}}
@endpush