<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Kategori;


class InformasiController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data pengumuman dan artikel
        $pengumumans = Pengumuman::with('kategori')->get();
        $artikels = Artikel::with('kategori')->get();
    
        // Menggabungkan koleksi dan mengurutkan berdasarkan created_at secara descending
        $informasi = $pengumumans->merge($artikels)->sortByDesc('created_at');
    
        // Pagination manual setelah penggabungan
        $perPage = 9; // Jumlah item per halaman
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $informasi->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentItems, $informasi->count(), $perPage, $currentPage, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);
    
        // Mengambil data kategori
        $kategoris = Kategori::all();
    
        // Mengirim data ke view welcome
        return view('welcome', [
            'informasi' => $paginatedItems,
            'kategoris' => $kategoris
        ]);
    }
    
}

