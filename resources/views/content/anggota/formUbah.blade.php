@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Ubah Anggota</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('anggota.prosesUbah') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="number" name="nim" value="{{ $anggota->nim }}" class="form-control @error('nim') is-invalid @enderror">
                        @error('nim')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{ $anggota->nama }}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prodi</label>
                        <input type="text" name="prodi" value="{{ $anggota->prodi }}" class="form-control @error('prodi') is-invalid @enderror">
                        @error('prodi')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fakultas</label>
                        <input type="text" name="fakultas" value="{{ $anggota->fakultas }}" class="form-control @error('fakultas') is-invalid @enderror">
                        @error('fakultas')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="id_anggota" value="{{ $anggota->id_anggota }}">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
