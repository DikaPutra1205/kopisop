<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use App\Models\StockTotal;
use Illuminate\Http\Request;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Manual::all();
        return view('pages.manuals.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.manuals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $material = $request->input('material');
        $qty = $request->input('qty');
        $ket = $request->input('ket');

        $materials = [
            "Pasir Cilegon" => 'pasir_cilegon',
            "Pasir Tayan" => 'pasir_tayan',
            "Split 10-20" => 'split_10_20',
            "Split Screening" => 'split_screening',
            "Fly Ash" => 'fly_ash',
            "Semen HC" => 'semen_hc',
            "Semen OPC" => 'semen_opc',
            "Abu Batu" => 'abu_batu',
            "Additive D" => 'additive_d',
            "Additive F" => 'additive_f',
            "Additive 1G" => 'additive_1g',
            "Additive 2G" => 'additive_2g',
            "Air" => 'air',
            "Solar" => 'solar'
        ];

        if (array_key_exists($material, $materials)) {
            $stock = StockTotal::find(1);

            $column = $materials[$material];
            $stock->$column -= $qty;

            $stock->save();
        } else {
            return response()->json(['error' => 'Material tidak valid'], 400);
        }

        Manual::create([
            'tanggal' => $tanggal,
            'material' => $material,
            'qty' => $qty,
            'ket' => $ket,
        ]);
        return redirect()->route('list-manuals')->with('success', 'Cash flow berhasil disimpan.');
    }

    public function edit(Request $request, $id)
    {
        $manual = Manual::find($id);

        if ($manual) {
            // Kembalikan data dalam format JSON atau sebagai view
            return response()->json($manual);
        } else {
            // Tangani jika data tidak ditemukan
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tanggal = $request->input('tanggal');
        $material = $request->input('material');
        $qty = $request->input('qty');
        $ket = $request->input('ket');

        $materials = [
            "Pasir Cilegon" => 'pasir_cilegon',
            "Pasir Tayan" => 'pasir_tayan',
            "Split 10-20" => 'split_10_20',
            "Split Screening" => 'split_screening',
            "Fly Ash" => 'fly_ash',
            "Semen HC" => 'semen_hc',
            "Semen OPC" => 'semen_opc',
            "Abu Batu" => 'abu_batu',
            "Additive D" => 'additive_d',
            "Additive F" => 'additive_f',
            "Additive 1G" => 'additive_1g',
            "Additive 2G" => 'additive_2g',
            "Air" => 'air',
            "Solar" => 'solar'
        ];

        if (array_key_exists($material, $materials)) {
            $stock = StockTotal::find(1);

            // Ambil data manual yang akan diupdate
            $manual = Manual::find($id);

            if ($manual) {
                // Kembalikan stok ke nilai sebelumnya jika perlu
                $oldMaterial = $manual->material;
                $oldQty = $manual->qty;

                if ($oldMaterial) {
                    $oldColumn = $materials[$oldMaterial];
                    $stock->$oldColumn += $oldQty; // Mengembalikan stok yang lama
                }

                // Kurangi stok dengan nilai yang baru
                $column = $materials[$material];
                $stock->$column -= $qty;

                $stock->save();

                // Update data Manual
                $manual->update([
                    'tanggal' => $tanggal,
                    'material' => $material,
                    'qty' => $qty,
                    'ket' => $ket,
                ]);

                return response()->json(['success' => 'Data berhasil diperbarui']);
            } else {
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }
        } else {
            return response()->json(['error' => 'Material tidak valid'], 400);
        }
        return redirect()->route('list-manuals')->with('success', 'Cash flow berhasil disimpan.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // Ambil data Manual yang akan dihapus
        $manual = Manual::find($id);

        if ($manual) {
            $material = $manual->material;
            $qty = $manual->qty;

            $materials = [
                "Pasir Cilegon" => 'pasir_cilegon',
                "Pasir Tayan" => 'pasir_tayan',
                "Split 10-20" => 'split_10_20',
                "Split Screening" => 'split_screening',
                "Fly Ash" => 'fly_ash',
                "Semen HC" => 'semen_hc',
                "Semen OPC" => 'semen_opc',
                "Abu Batu" => 'abu_batu',
                "Additive D" => 'additive_d',
                "Additive F" => 'additive_f',
                "Additive 1G" => 'additive_1g',
                "Additive 2G" => 'additive_2g',
                "Air" => 'air',
                "Solar" => 'solar'
            ];

            if (array_key_exists($material, $materials)) {
                $stock = StockTotal::find(1);

                // Tambahkan stok yang dihapus
                $column = $materials[$material];
                $stock->$column += $qty;

                $stock->save();

                // Hapus data Manual
                $manual->delete();

            } else {
                return response()->json(['error' => 'Material tidak valid'], 400);
            }
        } else {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        return redirect()->route('list-manuals')->with('success', 'Cash flow berhasil disimpan.');

    }
}
