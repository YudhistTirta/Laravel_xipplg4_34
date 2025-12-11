@extends('layouts.admin')

@section('title', 'Tambah Data Kelas')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulir Tambah Kelas</h3>
                </div>

                {{-- 1. Tampilkan Error Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger m-3">
                        <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- 2. Form Action ke Route 'store' --}}
                <form action="{{ route('admin.classes.store') }}" method="POST">
                    @csrf {{-- Wajib ada untuk keamanan --}}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Kelas</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: 10-A, 12-IPA-1" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="major">Jurusan</label>
                            <input type="text" name="major" class="form-control" id="major" placeholder="Contoh: IPA, IPS, RPL" value="{{ old('major') }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.classes.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection