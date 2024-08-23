<?php

namespace App\Http\Controllers;

use App\Models\Konversi;
use Illuminate\Http\Request;

class KonversiController extends Controller
{
    public function index()
    {
        $data = Konversi::all();
        return view('pages.konversi.index', compact('data'));
    }

    public function edit($id)
    {
        $data = Konversi::findOrFail($id);
        return view('pages.konversi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $konversi = Konversi::findOrFail($id);
        $konversi->pasir = $request->pasir;
        $konversi->split = $request->split;
        $konversi->screening = $request->screening;
        $konversi->save();

        return redirect()->route('list-konversi')->with('success', 'Data berhasil diubah.');
    }
}
