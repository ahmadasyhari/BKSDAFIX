<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        // Mengambil semua pengumuman dengan relasi kategori dan menampilkan dengan pagination
        $pengumumans = Pengumuman::with('kategori')->paginate(10);

        // Mengirim data pengumuman ke view index_pengumuman (untuk admin)
        return view('admin.index_pengumuman', compact('pengumumans'));
    }

    public function create()
    {
        // Mengambil semua kategori
        $kategoris = Kategori::all();

        // Mengirim data kategori ke view create_pengumuman (untuk admin)
        return view('admin.create_pengumuman', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('public/pengumuman_images', $imageName); // Store image in storage/app/public/pengumuman_images
        } else {
            $imageName = null; // No image uploaded
        }

        // Membuat pengumuman baru
        Pengumuman::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'konten' => $request->konten,
            'gambar' => $imageName,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Menghapus pengumuman berdasarkan ID
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function showPengumuman()
    {
        // Menampilkan daftar pengumuman di frontend dengan pagination
        $pengumumans = Pengumuman::paginate(10);
        return view('menu.pengumuman', compact('pengumumans'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('menu.detail_pengumuman', compact('pengumuman'));
    }

}
