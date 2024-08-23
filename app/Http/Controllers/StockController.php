<?php

namespace App\Http\Controllers;

use App\Models\Konversi;
use App\Models\Stock;
use App\Models\StockTotal;
use Illuminate\Http\Request;
use App\Exports\StocksExport;
use Maatwebsite\Excel\Facades\Excel;
use Termwind\Components\Dd;

class StockController extends Controller
{
    public function index()
    {
        $data = Stock::all();
        $konversi = Konversi::find(1);
        $total = StockTotal::all();
        return view('pages.stock.index', ['data' => $data, 'total' => $total, 'konversi' => $konversi]);
    }

    public function exportStocks()
    {
        $konversi = Konversi::find(1);
        return Excel::download(new StocksExport($konversi), 'stocks.xlsx');
    }

    public function create()
    {
        return view('pages.stock.create');
    }

    public function store(Request $request)
    {
        $konversi = Konversi::find(1);
        $newStock = [
            'periode' => $request->periode,
            'tanggal' => $request->tanggal,
            'pasir_cilegon' => $request->pasir_cilegon * $konversi->pasir,
            'pasir_tayan' => $request->pasir_tayan * $konversi->pasir,
            'split_10_20' => $request->split_10_20 * $konversi->split,
            'split_screening' => $request->split_screening * $konversi->screening,
            'fly_ash' => $request->fly_ash * 1000,
            'semen_hc' => $request->semen_hc * 1000,
            'semen_opc' => $request->semen_opc * 1000,
            'abu_batu' => $request->abu_batu * 1000,
            'additive_d' => $request->additive_d,
            'additive_f' => $request->additive_f,
            'additive_1g' => $request->additive_1g,
            'additive_2g' => $request->additive_2g,
            'air' => $request->air,
            'solar' => $request->solar,
        ];

        $total = StockTotal::find(1);

        $total->pasir_cilegon += intval($request->pasir_cilegon * $konversi->pasir);
        $total->pasir_tayan += intval($request->pasir_tayan * $konversi->pasir);
        $total->split_10_20 += intval($request->split_10_20 * $konversi->split);
        $total->split_screening += intval($request->split_screening * $konversi->screening);
        $total->fly_ash += intval($request->fly_ash * 1000);
        $total->semen_hc += intval($request->semen_hc * 1000);
        $total->semen_opc += intval($request->semen_opc * 1000);
        $total->abu_batu += intval($request->abu_batu * 1000);
        $total->additive_d += intval($request->additive_d);
        $total->additive_f += intval($request->additive_f);
        $total->additive_1g += intval($request->additive_1g);
        $total->additive_2g += intval($request->additive_2g);
        $total->air += intval($request->air);
        $total->solar += intval($request->solar);

        $total->save();
        Stock::create($newStock);


        return redirect()->route('list-stocks');
    }

    public function edit($id)
    {
        $data = Stock::find($id);
        $konversi = Konversi::find(1);
        return view('pages.stock.edit', ['data' => $data, 'konversi' => $konversi]);
    }

    public function update(Request $request, $id)
    {
        $materialStock = Stock::find($id);

        if (!$materialStock) {
            return redirect()->route('list-stocks')->with('error', 'Stock not found.');
        }

        $total = StockTotal::find(1);
        $konversi = Konversi::find(1);
        $stock_awal = Stock::find($id);

        $materialStock->periode = $request->periode;
        $materialStock->tanggal = $request->tanggal;
        $materialStock->pasir_cilegon = $request->pasir_cilegon * $konversi->pasir;
        $materialStock->pasir_tayan = $request->pasir_tayan * $konversi->pasir;
        $materialStock->split_10_20 = $request->split_10_20 * $konversi->split;
        $materialStock->split_screening = $request->split_screening * $konversi->screening;
        $materialStock->fly_ash = $request->fly_ash * 1000;
        $materialStock->semen_hc = $request->semen_hc * 1000;
        $materialStock->semen_opc = $request->semen_opc * 1000;
        $materialStock->abu_batu = $request->abu_batu * 1000;
        $materialStock->additive_d = $request->additive_d;
        $materialStock->additive_f = $request->additive_f;
        $materialStock->additive_1g = $request->additive_1g;
        $materialStock->additive_2g = $request->additive_2g;
        $materialStock->solar = $request->solar;

        $materialStock->save();
        

        $total->pasir_cilegon += ($request->pasir_cilegon * $konversi->pasir);
        $total->pasir_tayan += ($request->pasir_tayan * $konversi->pasir);
        $total->split_10_20 += ($request->split_10_20 * $konversi->split);
        $total->split_screening += ($request->split_screening * $konversi->screening);
        $total->fly_ash += ($request->fly_ash * 1000);
        $total->semen_hc += ($request->semen_hc * 1000);
        $total->semen_opc += ($request->semen_opc * 1000);
        $total->abu_batu += ($request->abu_batu * 1000);
        $total->additive_d += ($request->additive_d);
        $total->additive_f += ($request->additive_f);
        $total->additive_1g += ($request->additive_1g);
        $total->additive_2g += ($request->additive_2g);
        $total->air += ($request->air);
        $total->solar += ($request->solar);

        

        $total->pasir_cilegon -= ($stock_awal->pasir_cilegon );
        $total->pasir_tayan -= ($stock_awal->pasir_tayan );
        $total->split_10_20 -= ($stock_awal->split_10_20);
        $total->split_screening -= ($stock_awal->split_screening);
        $total->fly_ash -= ($stock_awal->fly_ash);
        $total->semen_hc -= ($stock_awal->semen_hc );
        $total->semen_opc -= ($stock_awal->semen_opc);
        $total->abu_batu -= ($stock_awal->abu_batu);
        $total->additive_d -= ($stock_awal->additive_d);
        $total->additive_f -= ($stock_awal->additive_f);
        $total->additive_1g -= ($stock_awal->additive_1g);
        $total->additive_2g -= ($stock_awal->additive_2g);
        $total->air -= ($stock_awal->air);
        $total->solar -= ($stock_awal->solar);
        $total->save();

        return redirect()->route('list-stocks')->with('success', 'Stock updated successfully.');
    }

    public function destroy($id)
    {

        $total = StockTotal::find(1);
        $stock_awal = Stock::find($id);

        $total->pasir_cilegon -= ($stock_awal->pasir_cilegon );
        $total->pasir_tayan -= ($stock_awal->pasir_tayan );
        $total->split_10_20 -= ($stock_awal->split_10_20);
        $total->split_screening -= ($stock_awal->split_screening);
        $total->fly_ash -= ($stock_awal->fly_ash);
        $total->semen_hc -= ($stock_awal->semen_hc );
        $total->semen_opc -= ($stock_awal->semen_opc);
        $total->abu_batu -= ($stock_awal->abu_batu);
        $total->additive_d -= ($stock_awal->additive_d);
        $total->additive_f -= ($stock_awal->additive_f);
        $total->additive_1g -= ($stock_awal->additive_1g);
        $total->additive_2g -= ($stock_awal->additive_2g);
        $total->air -= ($stock_awal->air);
        $total->solar -= ($stock_awal->solar);
        $total->save();

        $stock = Stock::find($id);
        $stock->delete();
        return redirect()->route('list-stocks')->with('success', 'Stock updated successfully.');
    }
}
