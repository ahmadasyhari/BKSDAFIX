<?php
namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        // Mengambil semua artikel dengan relasi kategori dan menampilkan dengan pagination
        $artikels = Artikel::with('kategori')->paginate(10);

        // Mengirim data artikel ke view index_artikel (untuk admin)
        return view('admin.index_artikel', compact('artikels'));
    }

    public function create()
    {
        // Mengambil semua kategori
        $kategoris = Kategori::all();

        // Mengirim data kategori ke view create_artikel (untuk admin)
        return view('admin.create_artikel', compact('kategoris'));
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
            $request->gambar->storeAs('public/artikel_images', $imageName); // Store image in storage/app/public/artikel_images
        } else {
            $imageName = null; // No image uploaded
        }

        // // Membuat artikel baru
        Artikel::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'konten' => $request->konten,
            'gambar' => $imageName,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Menghapus artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function showArtikel()
    {
        // Menampilkan daftar artikel di frontend dengan pagination
        $artikels = Artikel::paginate(10);
        return view('menu.artikel', compact('artikels'));
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('menu.detail_artikel', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategoris = Kategori::all();

        return view('admin.edit_artikel', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);

        // Temukan artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar) {
                Storage::delete('public/artikel_images/' . $artikel->gambar);
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('public/artikel_images', $imageName);
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $imageName = $artikel->gambar;
        }

        // Update artikel
        $artikel->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'konten' => $request->konten,
            'gambar' => $imageName, // Update gambar dengan yang baru atau yang lama
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }
}
