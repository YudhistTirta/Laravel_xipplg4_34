@extends('layouts.admin')

@section('title', 'Edit Data Kelas')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-warning"> {{-- Kita ganti jadi 'card-warning' biar beda --}}
                <div class="card-header">
                    <h3 class="card-title">Formulir Edit Kelas: {{ $class->name }}</h3>
                </div>

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

                {{-- 1. Form Action ke Route 'update' --}}
                <form action="{{ route('admin.classes.update', $class->id) }}" method="POST">
                    @csrf      {{-- Wajib ada --}}
                    @method('PUT') {{-- Wajib ada untuk method UPDATE --}}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Kelas</label>
                            {{-- 2. Tampilkan data lama di 'value' --}}
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $class->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="major">Jurusan</label>
                            {{-- 3. Tampilkan data lama di 'value' --}}
                            <input type="text" name="major" class="form-control" id="major" value="{{ old('major', $class->major) }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.classes.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection