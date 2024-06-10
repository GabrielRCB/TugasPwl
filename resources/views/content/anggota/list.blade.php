@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h1 class="h3 mb-2 text-gray-800">List Anggota</h1>
        </div>
        <div class="col-lg-6 text-right">
            <a href="{{route('anggota.tambah')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                   @foreach($anggota as $row)
                   <tr>
                       <td>{{ $no++ }}</td>
                       <td>{{ $row->nim }}</td>
                       <td>{{ $row->nama }}</td>
                       <td>{{ $row->prodi }}</td>
                       <td>{{ $row->fakultas }}</td>
                       <td>
                           <a href="{{ route('anggota.ubah', $row->id_anggota) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Ubah</a>
                           <a href="{{ route('anggota.hapus', $row->id_anggota) }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                       </td>
                   </tr>
               @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

