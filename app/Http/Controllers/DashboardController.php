<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class DashboardController extends Controller
{
    public function index() {
        $totalBuku = Buku::count();
        $totalKategori = Kategori::count();
        $totalanggota = Anggota::count();
        $totalpinjam = Peminjaman::count();
        return view('content.dasboard',compact('totalBuku','totalKategori','totalanggota','totalpinjam'));
}

}
