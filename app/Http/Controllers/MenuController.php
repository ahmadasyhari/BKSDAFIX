<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Menu;

class MenuController extends Controller
{
    public function create()
    {
        $menus = Menu::whereNull('parent_id')->get();
        $allMenus = Menu::all();

        return view('admin.create_menu', compact('menus', 'allMenus'));
    }

    public function destroy(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->children()->exists()) {
            return redirect()->back()->with([
                'warning' => 'Menu ini adalah menu induk dan memiliki sub-menu. Apakah Anda yakin ingin menghapusnya beserta semua sub-menunya?',
                'menu_id' => $menu->id
            ]);
        }

        $menu->delete();
        return redirect()->back()->with('success', 'Menu berhasil dihapus!');
    }

    public function forceDelete($id)
    {
        $menu = Menu::findOrFail($id);

        $menu->children()->delete();
        $menu->delete();

        return redirect()->back()->with('success', 'Menu dan semua sub-menu berhasil dihapus!');
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.show', compact('menu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

        if ($request->type === 'url') {
            $request->validate(['url' => 'required|url']);
            $data = [
                'title' => $request->title,
                'url' => $request->url,
                'content' => null,
                'parent_id' => $request->parent_id,
            ];
        } else {
            $request->validate(['content' => 'required']);
            $data = [
                'title' => $request->title,
                'url' => null,
                'content' => $request->content,
                'parent_id' => $request->parent_id,
            ];
        }

        Menu::create($data);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan!');
    }
}
