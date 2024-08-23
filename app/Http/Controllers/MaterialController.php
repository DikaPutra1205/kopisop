<?php

namespace App\Http\Controllers;

use App\Exports\MaterialExport;
use App\Models\PembelianMaterial;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MaterialController extends Controller
{
    public function index()
    {
        $data = PembelianMaterial::all();
        return view('pages.material.index', ['data' => $data]);
    }

    public function create()
    {
        return view('pages.material.create');
    }

    public function store(Request $request)
    {
        // Validasi input\
        $validated = $request->validate([
            'tanggal_po' => 'required|date',
            'tanggal_kirim' => 'required|date',
            'vendor' => 'required|string|max:255',
            'no_po' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'harga_include' => 'required|string',
            'ket_payment' => 'nullable|string|max:255',
            'bayar' => 'nullable|string',
            'tanggal_bayar' => 'nullable|date',
        ]);

        // Ambil input dari form
        $tanggal_po = $request->input('tanggal_po');
        $tanggal_kirim = $request->input('tanggal_kirim');
        $vendor = $request->input('vendor');
        $no_po = $request->input('no_po');
        $material = $request->input('material');
        $qty = $request->input('qty');

        // Konversi format rupiah menjadi integer
        $harga_include = $request->input('harga_include') ? str_replace(['Rp', '.', ' '], '',  $request->input('harga_include')) : 0;
        $harga_include = (int) $harga_include;

        // Hitung total PO
        $total_po = $qty * $harga_include;

        $ket_payment = $request->input('ket_payment');

        $bayar = $request->input('bayar') ? str_replace(['Rp', '.', ' '], '',  $request->input('bayar')) : 0;
        $bayar = (int) $bayar;

        $tanggal_bayar = $request->input('tanggal_bayar');

        // Hitung kurang bayar
        $kurang_bayar = $total_po - $bayar;
        if ($kurang_bayar < 0) {
            $kurang_bayar = 0;
        }

        $ket = $request->input('ket');

        // Simpan data ke database
        $pembelian = new PembelianMaterial();
        $pembelian->tanggal_po = $tanggal_po;
        $pembelian->tanggal_kirim = $tanggal_kirim;
        $pembelian->vendor = $vendor;
        $pembelian->no_po = $no_po;
        $pembelian->material = $material;
        $pembelian->qty = $qty;
        $pembelian->harga_include = $harga_include;
        $pembelian->total_po_keluar = $total_po;
        $pembelian->ket_payment = $ket_payment;
        $pembelian->bayar = $bayar;
        $pembelian->tgl_bayar = $tanggal_bayar;
        $pembelian->kurang_bayar = $kurang_bayar;
        $pembelian->ket = $ket;
        $pembelian->save();

        // Redirect dengan pesan sukses
        return redirect()->route('list-material')->with('success', 'Cash flow berhasil disimpan.');
    }

    public function edit($id)
    {
        $data = PembelianMaterial::find($id);
        return view('pages.material.edit', ['material' => $data]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggal_po' => 'required|date',
            'tanggal_kirim' => 'required|date',
            'vendor' => 'required|string|max:255',
            'no_po' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'harga_include' => 'required|string',
            'ket_payment' => 'nullable|string|max:255',
            'bayar' => 'nullable|string',
            'tanggal_bayar' => 'nullable|date',
        ]);

        // Ambil input dari form
        $tanggal_po = $request->input('tanggal_po');
        $tanggal_kirim = $request->input('tanggal_kirim');
        $vendor = $request->input('vendor');
        $no_po = $request->input('no_po');
        $material = $request->input('material');
        $qty = $request->input('qty');

        // Konversi format rupiah menjadi integer
        $harga_include = $request->input('harga_include') ? str_replace(['Rp', '.', ' '], '',  $request->input('harga_include')) : 0;
        $harga_include = (int) $harga_include;

        // Hitung total PO
        $total_po = $qty * $harga_include;

        $ket_payment = $request->input('ket_payment');

        $bayar = $request->input('bayar') ? str_replace(['Rp', '.', ' '], '',  $request->input('bayar')) : 0;
        $bayar = (int) $bayar;

        $tanggal_bayar = $request->input('tanggal_bayar');

        // Hitung kurang bayar
        $kurang_bayar = $total_po - $bayar;
        if ($kurang_bayar < 0) {
            $kurang_bayar = 0;
        }

        $ket = $request->input('ket');

        // Temukan data yang akan diupdate
        $pembelian = PembelianMaterial::findOrFail($id);

        // Update data di database
        $pembelian->tanggal_po = $tanggal_po;
        $pembelian->tanggal_kirim = $tanggal_kirim;
        $pembelian->vendor = $vendor;
        $pembelian->no_po = $no_po;
        $pembelian->material = $material;
        $pembelian->qty = $qty;
        $pembelian->harga_include = $harga_include;
        $pembelian->total_po_keluar = $total_po;
        $pembelian->ket_payment = $ket_payment;
        $pembelian->bayar = $bayar;
        $pembelian->tgl_bayar = $tanggal_bayar;
        $pembelian->kurang_bayar = $kurang_bayar;
        $pembelian->ket = $ket;
        $pembelian->save();

        // Redirect dengan pesan sukses
        return redirect()->route('list-material')->with('success', 'Cash flow berhasil diupdate.');
    }

    public function export($id)
    {
        $material = PembelianMaterial::findOrFail($id);
        return Excel::download(new MaterialExport($material), 'material_' . $material->no_po . '.xlsx');
    }
}
