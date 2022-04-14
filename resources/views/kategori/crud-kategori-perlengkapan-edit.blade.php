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
                    <form action="{{route('kategori-perlengkapan-update', $data_kategori_perlengkapan->id_kategori)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label @error('nama_kategori')
                                    class="text-danger" 
                                  @enderror>Nama Perlengkapan
                                      @error('nama_kategori')
                                       | {{$message}}
                                      @enderror
                                  </label>
                                  <input type="text" name="nama_kategori" 
                                  @if (old('nama_kategori'))
                                    value="{{old('nama_kategori')}}"  
                                  @else
                                    value="{{$data_kategori_perlengkapan->nama_kategori}}"    
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

@push('page-scripts')
    {{-- <script>alert(123)</script> --}}
@endpush