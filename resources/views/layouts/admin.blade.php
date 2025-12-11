<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'AdminLTE - Dilesin')</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Beranda</a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    {{-- 1. Brand Logo (Logo Dilesin Anda) --}}
    <a href="/admin/dashboard" class="brand-link" style="text-decoration: none;">
        
        {{-- Ini adalah logo burung berputar dari kode Anda sebelumnya --}}
        <div class="spinning-birds-container">
            <i class="fas fa-dove bird-1"></i>
            <i class="fas fa-dove bird-2"></i>
        </div>
        
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">
        
        {{-- 2. User Panel (Info Admin yang Login) --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- Ganti dengan foto admin jika ada, jika tidak, pakai ikon --}}
                <img src="https://ui-avatars.com/api/?name=Admin&background=454d55&color=fff" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                {{-- Ganti dengan nama admin yang sedang login --}}
                <a href="#" class="d-block">Admin Dilesin</a>
            </div>
        </div>

        {{-- 3. Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-header">MENU UTAMA</li>

                {{-- Item: Dashboard --}}
                <li class="nav-item">
                    {{-- 
                      request()->is('admin/dashboard') akan mengecek URL. 
                      Jika cocok, class 'active' akan ditambahkan.
                    --}}
                    <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">MASTER DATA</li>

                {{-- Item: Manajemen Data (Treeview/Dropdown) --}}
                {{-- 
                  Cek URL: Jika URL-nya mengandung 'admin/students' ATAU 'admin/teachers', 
                  maka grup ini akan otomatis terbuka ('menu-open').
                --}}
                <li class="nav-item {{ request()->is('admin/students*') || request()->is('admin/teachers*') || request()->is('admin/classes*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/students*') || request()->is('admin/teachers*') || request()->is('admin/classes*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Manajemen Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- Sub-Item: Siswa --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.students.index') }}" class="nav-link {{ request()->is('admin/students*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Siswa</p>
                            </a>
                        </li>
                        {{-- Sub-Item: Guru (Contoh) --}}
                        <li class="nav-item">
                            {{-- Ganti '#' dengan route Anda, misal: route('admin.teachers.index') --}}
                            <a href="#" class="nav-link {{ request()->is('admin/teachers*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Guru</p>
                            </a>
                        </li>
                        {{-- Sub-Item: Kelas (Contoh) --}}
                        <li class="nav-item">
                            {{-- Ganti '#' dengan route Anda, misal: route('admin.classes.index') --}}
                            <a href="{{ route('admin.classes.index') }}" class="nav-link {{ request()->is('admin/classes*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kelas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-header">SISTEM</li>

                {{-- Item: Logout (Contoh) --}}
                <li class="nav-item">
                    {{-- Ganti ini dengan form logout Anda --}}
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    
                    {{-- Form tersembunyi untuk logout --}}
                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> --}}

                </li>

            </ul>
        </nav>
        </div>
    </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper p-3">
    @yield('content')
  </div>

</div>
</body>
</html>
