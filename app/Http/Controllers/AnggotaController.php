<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public  function index(){
        $anggota = Anggota::all();
        return view('content.anggota.list', compact('anggota'));

    }

    public  function tambah(){
        return view('content.anggota.formTambah');
    }

    public function prosesTambah(Request $request){
        $this->validate($request,[
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required'
        ]);

        $anggota = new Anggota();
        $anggota->nim = $request->nim;
        $anggota->nama = $request->nama;
        $anggota->prodi = $request->prodi;
        $anggota->fakultas = $request->fakultas;

        try{
            $anggota->save();
            return redirect(route('anggota.index'))->with('pesan', ['success', 'Berasil menambah anggota']);
        }catch (\Exception $e){
            return redirect(route('anggota.index'))->with('pesan', ['danger', 'Gagal menambah anggota']);
        }
    }

    public function ubah($id){
        $anggota = Anggota::findOrFail($id);
        return view('content.anggota.formUbah', compact('anggota'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request,[
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required'
        ]);

        $anggota = Anggota::findOrFail($request->id_anggota);
        $anggota->nim = $request->nim;
        $anggota->nama = $request->nama;
        $anggota->prodi = $request->prodi;
        $anggota->fakultas = $request->fakultas;




        try{
            $anggota->save();
            return redirect(route('anggota.index'))->with('pesan', ['success', 'Berasil Mengubah Kategori']);
        }catch (\Exception $e){
            return redirect(route('anggota.index'))->with('pesan', ['danger', 'Gagal Mengubah Kategori']);
        }
    }


    public  function hapus($id){
        $anggota = Anggota::findOrFail($id);


        try{
            $anggota->delete();
            return redirect(route('anggota.index'))->with('pesan', ['success', 'Berasil Hapus Kategori']);
        }catch (\Exception $e){
            return redirect(route('anggota.index'))->with('pesan', ['danger', 'Gagal Hapus  Kategori']);
        }
    }
}
