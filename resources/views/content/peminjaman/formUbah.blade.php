@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Ubah Anggota</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('anggota.prosesUbah') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" value="{{ $peminjaman->judul_buku }}" class="form-control @error('judul_buku') is-invalid @enderror">
                        @error('judul_buku')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Buku</label>
                        <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                            @foreach($kategori as $row)
                                @php
                                $selected = ($row->id_kategori == $peminjaman->id_kategori) ? "selected" : "";
                                @endphp
                                <option value="{{$row->id_kategori}}" {{$selected}}>{{$row->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nim</label>
                        <input type="number" name="nim" value="{{ $peminjaman->nim }}" class="form-control @error('nim') is-invalid @enderror">
                        @error('nim')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{ $peminjaman->nama }}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prodi</label>
                        <input type="text" name="prodi" value="{{ $peminjaman->prodi }}" class="form-control @error('prodi') is-invalid @enderror">
                        @error('prodi')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Peminjam</label>
                        <input type="date" name="tgl_pinjam" value="{{ $peminjaman->tgl_pinjam }}" class="form-control @error('tgl_pinjam') is-invalid @enderror">
                        @error('tgl_pinjam')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" value="{{ $peminjaman->tgl_kembali }}" class="form-control @error('tgl_kembali') is-invalid @enderror">
                        @error('tgl_kembali')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="id_anggota" value="{{ $peminjaman->id_peminjaman }}">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
