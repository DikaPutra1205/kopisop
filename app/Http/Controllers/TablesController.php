<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TablesController extends Controller
{
    public function index()
    {
        $table = Table::all();

        return view('pages.table.index', ['table' => $table]);
    }

    public function create()
    {
        return view('pages.table.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'table' => 'required|string|max:255',
        ]);

        $table = Table::create([
            'nomor_meja' => $validatedData['table'],
        ]);

        return redirect()->route('list-table')->with('success', 'User successfully created.');
    }
}
