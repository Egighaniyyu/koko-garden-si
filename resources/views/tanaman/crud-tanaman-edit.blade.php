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
                    <form action="{{route('tanaman-update', $data_tanaman->id_tanaman)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label @error('nama_barang')
                                    class="text-danger" 
                                  @enderror>Nama Tanaman
                                      @error('nama_barang')
                                       | {{$message}}
                                      @enderror
                                  </label>
                                  <input type="text" name="nama_tanaman" 
                                  @if (old('nama_tanaman'))
                                    value="{{old('nama_tanaman')}}"  
                                  @else
                                    value="{{$data_tanaman->nama_tanaman}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Kategori</label>
                                  <select class="form-control" name="id_kategori">
                                    <option>{{$kategori_tanaman[$data_tanaman->id_kategori-1]->nama_kategori}}</option>
                                    @if (old('id_kategori'))
                                      value="{{old('id_kategori')}}"  
                                    @else
                                      @foreach ($kategori_tanaman as $kt)
                                        <option value="{{$kt -> id_kategori}}">{{$kt -> nama_kategori}}</option>
                                      @endforeach   
                                    @endif
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Deskripsi</label>
                                  <input type="text" name="deskripsi" 
                                  @if (old('deskripsi'))
                                    value="{{old('deskripsi')}}"  
                                  @else
                                    value="{{$data_tanaman->deskripsi}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Stok</label>
                                  <input type="text" name="stok" 
                                  @if (old('stok'))
                                    value="{{old('stok')}}"  
                                  @else
                                    value="{{$data_tanaman->stok}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" 
                                    @if (old('harga'))
                                      value="{{old('harga')}}"  
                                    @else
                                      value="{{$data_tanaman->harga}}"    
                                    @endif
                                    class="form-control">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sampul</label>
                                    <input type="file" class="form-control" name="sampul"
                                    @if (old('sampul'))
                                      value="{{old('sampul')}}"  
                                    @else
                                      value="{{$data_tanaman->sampul}}"    
                                    @endif>
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