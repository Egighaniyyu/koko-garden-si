<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">koko Garden</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="@if (Request::segment(1) == '' or Request::segment(1) == '/') active @endif"><a class="nav-link" href="{{route('home')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
          
          <li class="menu-header">Menu Data</li>
          {{-- untuk ngasih bagian yang aktif kasih class "active" --}}
          <li class="@if (Request::segment(1) == 'data-admin') active @endif"><a class="nav-link" href="{{route('crud')}}"><i class="fas fa-user"></i> <span>Data Administrator</span></a></li>
          <li class="@if (Request::segment(1) == 'data-costumer') active @endif"><a class="nav-link" href="{{route('crud-costumer')}}"><i class="fas fa-users"></i> <span>Data Costumers</span></a></li>
          <li class="@if (Request::segment(1) == 'data-tanaman') active @endif"><a class="nav-link" href="{{route('crud-tanaman')}}"><i class="fas fa-seedling"></i> <span>Data Tanaman</span></a></li>
          <li class="@if (Request::segment(1) == 'data-perlengkapan') active @endif"><a class="nav-link" href="{{route('crud-perlengkapan')}}"><i class="fas fa-toolbox"></i> <span>Data Perlengkapan</span></a></li>
          <li class="nav-item dropdown @if (Request::segment(1) == 'data-kategori') active @endif">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Data Kategori</span></a>
            <ul class="dropdown-menu">
              <li class="@if (Request::segment(1) == 'data-kategori' and Request::segment(2) == 'tanaman') active @endif"><a class="nav-link" href="{{route('crud-kategori-tanaman')}}">Kategori Tanaman</a></li>
              <li class="@if (Request::segment(1) == 'data-kategori' and Request::segment(2) == 'perlengkapan') active @endif"><a class="nav-link" href="{{route('crud-kategori-perlengkapan')}}">Kategori Perlengkapan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown @if (Request::segment(1) == 'data-penjualan') active @endif">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-dollar-sign"></i> <span>Data Penjualan</span></a>
            <ul class="dropdown-menu">
              <li class="@if (Request::segment(1) == 'data-penjualan' and Request::segment(2) == 'tanaman') active @endif"><a class="nav-link" href="{{route('crud-penjualan-tanaman')}}">Penjualan Tanaman</a></li>
              <li class="@if (Request::segment(1) == 'data-penjualan' and Request::segment(2) == 'perlengkapan') active @endif"><a class="nav-link" href="{{route('crud-penjualan-perlengkapan')}}">Penjualan Perlengkapan</a></li>
            </ul>
          </li>
          <li class="@if (Request::segment(1) == 'data-pengeluaran') active @endif"><a class="nav-link" href="{{route('crud-pengeluaran')}}"><i class="fas fa-coins"></i> <span>Data Pengeluaran</span></a></li>
          
        </ul>

    </aside>
  </div>