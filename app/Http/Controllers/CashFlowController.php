<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashFlow;

class CashFlowController extends Controller
{
    public function index()
    {
        $data = CashFlow::all();
        return view('pages.cashFlow.index', ['data' => $data]);
    }

    public function create()
    {
        return view('pages.cashFlow.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'akun' => 'required|string|max:255',
            'berita' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'dana_masuk' => 'nullable|string',
            'dana_keluar' => 'nullable|string'
        ]);

        // Ambil nilai input dan format dana_masuk dan dana_keluar
        $tanggal = $request->input('tanggal');
        $akun = $request->input('akun');
        $berita = $request->input('berita');
        $keterangan = $request->input('keterangan');

        $danaMasuk = $request->input('dana_masuk') ? str_replace(['Rp', '.', ' '], '', $request->input('dana_masuk')) : 0;
        $danaKeluar = $request->input('dana_keluar') ? str_replace(['Rp', '.', ' '], '', $request->input('dana_keluar')) : 0;

        $danaMasuk = (int) $danaMasuk;
        $danaKeluar = (int) $danaKeluar;

        // Hitung saldo
        $lastRecord = CashFlow::orderBy('id', 'desc')->first();
        $saldo = $lastRecord ? $lastRecord->saldo : 0;
        $saldo += $danaMasuk;
        $saldo -= $danaKeluar;

        // Simpan ke database
        $cashFlow = new CashFlow();
        $cashFlow->tanggal = $tanggal;
        $cashFlow->akun = $akun;
        $cashFlow->berita = $berita;
        $cashFlow->keterangan = $keterangan;
        $cashFlow->dana_masuk = $danaMasuk;
        $cashFlow->dana_keluar = $danaKeluar;
        $cashFlow->saldo = $saldo;
        $cashFlow->save();

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('list-cashflows')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $data = CashFlow::find($id);
        return view('pages.cashFlow.edit', ['cashFlow' => $data]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'akun' => 'required|string|max:255',
            'berita' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'dana_masuk' => 'nullable|string',
            'dana_keluar' => 'nullable|string'
        ]);

        // Ambil nilai input dan format dana_masuk dan dana_keluar
        $tanggal = $request->input('tanggal');
        $akun = $request->input('akun');
        $berita = $request->input('berita');
        $keterangan = $request->input('keterangan');

        $danaMasuk = $request->input('dana_masuk') ? str_replace(['Rp', '.', ' '], '', $request->input('dana_masuk')) : 0;
        $danaKeluar = $request->input('dana_keluar') ? str_replace(['Rp', '.', ' '], '', $request->input('dana_keluar')) : 0;

        $danaMasuk = (int) $danaMasuk;
        $danaKeluar = (int) $danaKeluar;

        // Dapatkan data cash flow yang akan diupdate
        $cashFlow = CashFlow::findOrFail($id);

        // Hitung selisih dana_masuk dan dana_keluar yang lama dan baru
        $selisihDanaMasuk = $danaMasuk - $cashFlow->dana_masuk;
        $selisihDanaKeluar = $danaKeluar - $cashFlow->dana_keluar;

        // Update data cash flow
        $cashFlow->tanggal = $tanggal;
        $cashFlow->akun = $akun;
        $cashFlow->berita = $berita;
        $cashFlow->keterangan = $keterangan;
        $cashFlow->dana_masuk = $danaMasuk;
        $cashFlow->dana_keluar = $danaKeluar;
        $cashFlow->save();

        // Update saldo mulai dari entri yang diubah hingga akhir
        $cashFlows = CashFlow::orderBy('id', 'asc')->get();
        $saldo = 0;

        foreach ($cashFlows as $flow) {
            if ($flow->id == $cashFlow->id) {
                $saldo += $danaMasuk - $danaKeluar;
            } else if ($flow->id > $cashFlow->id) {
                $saldo += $flow->dana_masuk - $flow->dana_keluar;
            } else {
                $saldo = $flow->saldo;
            }

            if ($flow->id >= $cashFlow->id) {
                $flow->saldo = $saldo;
                $flow->save();
            }
        }

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('list-cashflows')->with('success', 'Data berhasil diperbarui.');
    }
}
