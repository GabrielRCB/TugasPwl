<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Buku;
class BukuController extends Controller
{
    public  function index(){
        $buku = Buku::with('kategori')->get();
        return view('content.buku.list' , compact('buku'));

    }
    public function tambah(){
        $kategori = Kategori::all();
        return view('content.buku.formTambah', compact('kategori'));

    }
    public function prosesTambah(Request $request){
        $this->validate($request, [
            'judul_buku' => 'required',
            'isi_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'id_kategori' => 'required',
            'gambar_buku' => 'required',
        ]);

        $request->file('gambar_buku')->store('public');
        $gambar_buku = $request->file('gambar_buku')->hashName();

        $buku = new Buku();
        $buku->judul_buku = $request->judul_buku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->isi_buku = $request->isi_buku;
        $buku->id_kategori = $request->id_kategori;
        $buku->gambar_buku = $gambar_buku;

        try {
            $buku->save();
            return redirect(route('buku.index'))->with('pesan',['success','Berhasil menambah Buku']);
        } catch (\Exception $e) {
            return redirect(route('buku.index'))->with('pesan',['danger','Gagal menambah Buku']);
        }
    }

    public function ubah($id){
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('content.buku.formUbah',compact('buku', 'kategori'));

    }
    public function prosesUbah(Request $request){
        $this->validate($request, [
            'judul_buku' => 'required',
            'isi_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'id_kategori' => 'required',
        ]);

        $buku = Buku::findOrFail($request->id_buku);
        $buku->judul_buku = $request->judul_buku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->isi_buku = $request->isi_buku;
        $buku->id_kategori = $request->id_kategori;

        if ($request->hasFile('gambar_buku')){
            $request->file('gambar_buku')->store('public');
            $gambar_buku = $request->file('gambar_buku')->hashName();
            $buku->gambar_buku = $gambar_buku;
        }

        try {
            $buku->save();
            return redirect(route('buku.index'))->with('pesan',['success','Berhasil Mengubah Buku']);
        } catch (\Exception $e) {
            return redirect(route('buku.index'))->with('pesan',['danger','Gagal Mengubah Buku']);
        }

    }
    public function hapus($id){
        $buku = Buku::findOrFail($id);

        try {
            $buku->delete();
            return redirect(route('buku.index'))->with('pesan',['success','Berhasil Hapus Buku']);
        } catch (\Exception $e) {
            return redirect(route('buku.index'))->with('pesan',['danger','Gagal Hapus Buku']);
        }

    }
}
