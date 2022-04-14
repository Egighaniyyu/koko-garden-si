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
                    <form action="{{route('pengeluaran-simpan')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Nama Barang</label>
                                  <input type="text" name="nama_barang" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="text" name="jumlah" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Total</label>
                                  <input type="text" name="total" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Tanggal</label>
                                  <input type="date" name="tanggal" class="form-control">
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