<?php

namespace App\Http\Controllers;

use App\Models\Solar;
use App\Models\Stock;
use Illuminate\Http\Request;

class SolarController extends Controller
{
    public function index()
    {
        $data = Solar::all();
        return view('pages.solar.index', ['data' => $data]);
    }

    public function create()
    {
        return view('pages.solar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pemakaian' => 'required|integer|min:0',
        ]);

        $latestStock = Stock::orderBy('created_at', 'desc')->first();

        if ($latestStock) {
            $latestStock->solar -= $request->pemakaian;
            $latestStock->save();
        }

        Solar::create($request->all());

        return redirect()->route('list-solar')->with('success', 'Solar usage recorded successfully.');
    }

    public function edit($id)
    {
        $data = Solar::find($id);
        return view('pages.solar.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pemakaian' => 'required|integer|min:0',
        ]);

        $solarUsage = Solar::find($id);
        $oldPemakaian = $solarUsage->pemakaian;

        $solarUsage->tanggal = $request->tanggal;
        $solarUsage->pemakaian = $request->pemakaian;
        $solarUsage->save();

        $latestStock = Stock::orderBy('created_at', 'desc')->first();
        if ($latestStock) {
            $latestStock->solar += $oldPemakaian;
            $latestStock->solar -= $request->pemakaian;
            $latestStock->save();
        }

        return redirect()->route('list-solar')->with('success', 'Solar usage updated and stock adjusted.');
    }

    public function destroy($id)
    {
        $solarUsage = Solar::find($id);

        if ($solarUsage) {
            $latestStock = Stock::orderBy('created_at', 'desc')->first();
            if ($latestStock) {
                $latestStock->solar += $solarUsage->pemakaian;
                $latestStock->save();
            }

            $solarUsage->delete();
        }

        return redirect()->route('list-solar')->with('success', 'Solar usage record deleted and stock updated.');
    }
}
