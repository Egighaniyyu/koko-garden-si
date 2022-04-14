@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Pengeluaran')

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('pengeluaran-update', $data_pengeluaran->id_transaksi)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label @error('nama_barang')
                                    class="text-danger" 
                                  @enderror>Nama Barang
                                      @error('nama_barang')
                                       | {{$message}}
                                      @enderror
                                  </label>
                                  <input type="text" name="nama_barang" 
                                  @if (old('nama_barang'))
                                    value="{{old('nama_barang')}}"  
                                  @else
                                    value="{{$data_pengeluaran->nama_barang}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="text" name="jumlah" 
                                  @if (old('jumlah'))
                                    value="{{old('jumlah')}}"  
                                  @else
                                    value="{{$data_pengeluaran->jumlah}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Total</label>
                                  <input type="text" name="total" 
                                  @if (old('total'))
                                    value="{{old('total')}}"  
                                  @else
                                    value="{{$data_pengeluaran->total}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" name="tanggal" 
                                  @if (old('tanggal'))
                                    value="{{old('tanggal')}}"  
                                  @else
                                    value="{{$data_pengeluaran->tanggal}}"    
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