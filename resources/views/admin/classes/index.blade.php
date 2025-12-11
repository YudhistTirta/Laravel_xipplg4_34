@extends('layouts.admin')

@section('title', 'Manajemen Data Kelas') {{-- Mengganti judul halaman --}}

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            {{-- 1. Pesan Sukses (jika ada) --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Semua Kelas</h3>
                    <div class="card-tools">
                        {{-- 2. Tombol Tambah Data --}}
                        <a href="{{ route('admin.classes.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Kelas Baru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kelas</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- 3. Looping Data Kelas --}}
                            @forelse ($classes as $class)
                                <tr>
                                    <td>{{ $class->id }}</td>
                                    <td>{{ $class->name }}</td>
                                    <td>{{ $class->major }}</td>
                                    <td>
                                        {{-- 4. Tombol Edit --}}
                                        <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        {{-- 5. Tombol Hapus (dalam bentuk form) --}}
                                        <form action="{{ route('admin.classes.destroy', $class->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data kelas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection