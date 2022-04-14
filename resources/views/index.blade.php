@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title' , 'Index')

@section('header')
    <h1>Dashboard</h1>
@endsection

{{-- apabila banyak baris --}}
@section('content')
<div class="section-body">
    <div class="card card-statistic-2">
        <div class="card-header">
            <h3>Selamat Datang Administrator</h3>
            <h4>Koko Garden | Sistem Informasi Toko Tanaman Koko Garden</h4>
            <br>
          </div>
        <div class="card-stats">
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">2</div>
              <div class="card-stats-item-label">Tanaman</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">2</div>
              <div class="card-stats-item-label">Perlengkapan Cocok Tanam</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">2</div>
              <div class="card-stats-item-label">Costumers</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Orders</h4>
          </div>
          <div class="card-body">
            2
          </div>
        </div>
      </div>
</div>
@endsection

@push('page-scripts')
    {{-- <script>alert(123)</script> --}}
@endpush