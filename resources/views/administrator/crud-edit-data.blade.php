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
                    <form action="{{route('crud-update', $data_admin->id_administrator)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" name="nama" 
                                  @if (old('nama'))
                                    value="{{old('nama')}}"  
                                  @else
                                    value="{{$data_admin->nama}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" name="username" 
                                  @if (old('username'))
                                    value="{{old('username')}}"  
                                  @else
                                    value="{{$data_admin->username}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" name="email" 
                                  @if (old('email'))
                                    value="{{old('email')}}"  
                                  @else
                                    value="{{$data_admin->email}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Password</label>
                                  <input type="text" name="password" 
                                  @if (old('password'))
                                    value="{{old('password')}}"  
                                  @else
                                    value="{{$data_admin->password}}"    
                                  @endif
                                  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Nomor HP</label>
                                  <input type="text" name="no_hp" 
                                  @if (old('no_hp'))
                                    value="{{old('no_hp')}}"  
                                  @else
                                    value="{{$data_admin->no_hp}}"    
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