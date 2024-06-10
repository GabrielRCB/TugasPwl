@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"> Ubah Buku</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('buku.prosesUbah')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" value="{{$buku->judul_buku}}" class="form-control @error('judul_buku') is-invalid @enderror">
                        @error('judul_buku')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" value="{{$buku->penulis}}" class="form-control @error('penulis') is-invalid @enderror">
                        @error('penulis')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" value="{{$buku->penerbit}}" class="form-control @error('penerbit') is-invalid @enderror">
                        @error('penerbit')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori Buku</label>
                        <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                            @foreach($kategori as $row)
                                @php
                                $selected = ($row->id_kategori == $buku->id_kategori) ? "selected" : "";
                                @endphp
                                <option value="{{$row->id_kategori}}" {{$selected}}>{{$row->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" name="gambar_buku"  class="form-control @error('gambar_buku') is-invalid @enderror"
                               accept="image/*" onchange="tampilkanPreview(this, 'tampilFoto')">
                        @error('gambar_buku')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                        <p></p>
                        <img id="tampilFoto"  onerror="this.onerror=null;this.src='https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0OKABlN930GwaMQz.jpg'; " src="{{route('storage',$buku->gambar_buku)}}" width="15%">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea id="editor" name="isi_buku" class="form-control @error('isi_buku') is-invalid @enderror">{{$buku->isi_buku}}</textarea>
                        @error('isi_buku')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="id_buku" value="{{$buku->id_buku}}">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{route('buku.index')}}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
