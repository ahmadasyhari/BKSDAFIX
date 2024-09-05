<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Artikel;
use App\Models\Kategori;

class InformasiController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data pengumuman dan artikel secara terpisah
        $pengumumans = Pengumuman::with('kategori')->orderBy('created_at', 'desc')->paginate(9, ['*'], 'pengumumans');
        $artikels = Artikel::with('kategori')->orderBy('created_at', 'desc')->paginate(9, ['*'], 'artikels');
        
        // Mengambil data kategori
        $kategoris = Kategori::all();

        // Mengirim data pengumuman dan artikel secara terpisah ke view welcome
        return view('welcome', [
            'pengumumans' => $pengumumans,
            'artikels' => $artikels,
            'kategoris' => $kategoris
        ]);
    }
}

