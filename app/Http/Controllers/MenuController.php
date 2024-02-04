<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Menu;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('pages.menu.index', ['menu' => $menu]);
    }

    public function create()
    {
        return view('pages.menu.create');
    }

    public function store(StoreProductRequest $request)
    {
        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $params = $request->validated();
        
        if ($product = Menu::create($params)) {
            $product->image = $imagePath;
            $product->save();

            return Redirect::route('list-menu')->with('success', 'Ditambahkan!');
        }
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('pages.menu.edit', compact('menu'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = Menu::findOrFail($id);

        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
        $oldImagePath = $menu->image;

        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->image = $imagePath;

        if ($request->hasFile('image') && $oldImagePath && file_exists(public_path($oldImagePath))) {
            unlink(public_path($oldImagePath));  // Delete the old image file
        }

        $menu->save();

        return redirect()->route('list-menu')->with('success', 'Menu updated successfully');
    }
    
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image && file_exists(public_path($menu->image))) {
            unlink(public_path($menu->image));
        }

        $menu->delete();

        return redirect()->route('list-menu')->with('success', 'Menu deleted successfully');
    }
}
