<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "buku";
    protected $primaryKey = "id_buku";
    protected $fillable = ["gambar_buku","judul_buku","isi_buku","penulis","penerbit","id_kategori"];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori');

    }
}
