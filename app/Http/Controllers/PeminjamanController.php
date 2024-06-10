<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public  function index(){
        $peminjaman = Peminjaman::with('kategori')->get();
        return view('content.peminjaman.list' , compact('peminjaman'));

    }

    public  function tambah(){
        $kategori = Kategori::all();
        return view('content.peminjaman.formTambah',compact('kategori'));
    }

    public function prosesTambah(Request $request){
        $this->validate($request,[
            'judul_buku' => 'required',
            'id_kategori' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ]);

        $peminjaman = new Peminjaman();
        $peminjaman->judul_buku = $request->judul_buku;
        $peminjaman->id_kategori = $request->id_kategori;
        $peminjaman->nim = $request->nim;
        $peminjaman->nama = $request->nama;
        $peminjaman->prodi = $request->prodi;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->tgl_kembali = $request->tgl_kembali;

        try{
            $peminjaman->save();
            return redirect(route('peminjaman.index'))->with('pesan', ['success', 'Berasil menambah peminjaman']);
        }catch (\Exception $e){
            return redirect(route('peminjaman.index'))->with('pesan', ['danger', 'Gagal menambah peminjaman']);
        }
    }

    public function ubah($id){
        $peminjaman = Peminjaman::findOrFail($id);
        return view('content.peminjaman.formUbah', compact('peminjaman'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request,[
            'judul_buku' => 'required',
            'id_kategori' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ]);

        $peminjaman = Peminjaman::findOrFail($request->id_kategori);
        $peminjaman->judul_buku = $request->judul_buku;
        $peminjaman->id_kategori = $request->id_kategori;
        $peminjaman->nim = $request->nim;
        $peminjaman->nama = $request->nama;
        $peminjaman->prodi = $request->prodi;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->tgl_kembali = $request->tgl_kembali;

        try{
            $peminjaman->save();
            return redirect(route('peminjaman.index'))->with('pesan', ['success', 'Berasil Mengubah peminjaman']);
        }catch (\Exception $e){
            return redirect(route('peminjaman.index'))->with('pesan', ['danger', 'Gagal Mengubah peminjaman']);
        }
    }

    public  function hapus($id){
        $peminjaman = Peminjaman::findOrFail($id);


        try{
            $peminjaman->delete();
            return redirect(route('peminjaman.index'))->with('pesan', ['success', 'Berasil Hapus peminjaman']);
        }catch (\Exception $e){
            return redirect(route('peminjaman.index'))->with('pesan', ['danger', 'Gagal Hapus  peminjaman']);
        }
    }
}
