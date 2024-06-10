<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = "peminjaman";
    protected $primaryKey = "id_peminjaman";
    protected $fillable = ["nim","nama","prodi","tgl_pinjam","tgl_kembali","id_kategori"];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori');

    }
}
