@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Kategori Perlengkapan')

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('kategori-perlengkapan-simpan')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Nama Kategori</label>
                                  <input type="text" name="nama_kategori" class="form-control">
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