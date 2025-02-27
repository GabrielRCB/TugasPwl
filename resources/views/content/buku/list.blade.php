@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">List Buku</h1>
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{route('buku.tambah')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>

        @if(session()->has('pesan'))
            <div class="alert alert-{{session()->get('pesan')[0]}}">
                {{session()->get('pesan')[1]}}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
                        <thead>
                       <tr>
                           <th>No</th>
                           <th>Judul</th>
                           <th>Kategori</th>
                           <th>Penulis</th>
                           <th>Penerbit</th>
                           <th>Deskripsi</th>
                           <th>Cover</th>
                           <th>Aksi</th>
                       </tr>
                        </thead>
                        <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($buku as $row)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$row->judul_buku}}</td>
                                <td>{{$row->kategori->nama_kategori}}</td>
                                <td>{{$row->penulis}}</td>
                                <td>{{$row->penerbit}}</td>
                                <td>{{$row->isi_buku}}</td>
                                <td><img src="{{route('storage', $row->gambar_buku)}}" width="70px" height="70px"></td>
                                <td>
                                    <a href="{{route('buku.ubah', $row->id_buku)}}" class="btn  btn-sm btn-success"><i class=" fa fa-edit"></i> Ubah</a>
                                    <a href="{{route('buku.hapus', $row->id_buku)}}" onclick="return confirm('Apakah anda yakin?')" class="btn  btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
