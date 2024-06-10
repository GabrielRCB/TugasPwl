<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public  function index(){
        $kategori = Kategori::all();
        return view('content.kategori.list', compact('kategori'));

    }

    public  function tambah(){
        return view('content.kategori.formTambah');
    }

    public function prosesTambah(Request $request){
        $this->validate($request,[
            'nama_kategori' => 'required'
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        try{
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berasil menambah Kategori']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal menambah Kategori']);
        }
    }

    public function ubah($id){
        $kategori = Kategori::findOrFail($id);
        return view('content.kategori.formUbah', compact('kategori'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request,[
            'id_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($request->id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;

        try{
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berasil Mengubah Kategori']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal Mengubah Kategori']);
        }
    }

    public  function hapus($id){
        $kategori = Kategori::findOrFail($id);


        try{
            $kategori->delete();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berasil Hapus Kategori']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal Hapus  Kategori']);
        }
    }
}
