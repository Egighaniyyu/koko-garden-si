@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Administrator')

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('crud-simpan')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Password</label>
                                  <input type="text" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Nomor HP</label>
                                  <input type="text" name="no_hp" class="form-control">
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