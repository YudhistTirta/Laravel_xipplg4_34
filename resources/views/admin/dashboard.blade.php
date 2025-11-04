@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
  <h1 class="mb-3">Dashboard Admin</h1>

  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>
          <p>Jumlah Siswa</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-graduate"></i>
        </div>
        <a href="{{ route('admin.students.index') }}" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>10</h3>
          <p>Jumlah Kelas</p>
        </div>
        <div class="icon">
          <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    </div>
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Pemberitahuan</h3>
        </div>
        <div class="card-body">
          Selamat datang di panel admin <b>Dilesin Academi</b> 
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Link Cepat</h3>
        </div>
        <div class="card-body">
          <a href="{{ route('admin.students.create') }}" class="btn btn-primary btn-block">Tambah Siswa Baru</a>
          <a href="#" class="btn btn-secondary btn-block mt-2">Kelola Guru</a>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection