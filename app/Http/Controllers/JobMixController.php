<?php

namespace App\Http\Controllers;

use App\Models\FA;
use App\Models\JobMix;
use App\Models\NFA;
use App\Models\Special;
use Illuminate\Http\Request;

class JobMixController extends Controller
{
    public function index()
    {
        $fa = FA::all();
        $nfa = NFA::all();
        $special = Special::all();

        return view('pages.jobmix.index', compact('fa', 'nfa', 'special'));
    }

    public function create()
    {
        return view('pages.jobmix.create');
    }

    public function store(Request $request)
    {
        $jenis = $request->input('jenis');
        $mutu = $request->input('mutu');
        $pasir = $request->input('pasir');
        $dust = $request->input('dust');
        $split = $request->input('split');
        $additive_d = $request->input('additive_d');
        $additive_f = $request->input('additive_f');
        $additive_1g = $request->input('additive_1g');
        $additive_2g = $request->input('additive_2g');
        $semen = $request->input('semen');
        $fly_ash = $request->input('fly_ash');
        $air = $request->input('air');


        switch ($jenis) {
            case "FA":
                FA::create([
                    'mutu' => $mutu,
                    'pasir' => $pasir,
                    'dust' => $dust,
                    'split' => $split,
                    'additive_d' => $additive_d,
                    'additive_f' => $additive_f,
                    'additive_1g' => $additive_1g,
                    'additive_2g' => $additive_2g,
                    'semen' => $semen,
                    'fly_ash' => $fly_ash,
                    'air' => $air,
                ]);
                break;
            case "NFA":
                NFA::create([
                    'mutu' => $mutu,
                    'pasir' => $pasir,
                    'dust' => $dust,
                    'split' => $split,
                    'additive_d' => $additive_d,
                    'additive_f' => $additive_f,
                    'additive_1g' => $additive_1g,
                    'additive_2g' => $additive_2g,
                    'semen' => $semen,
                    'air' => $air,
                ]);
                break;
            case "Special":
                Special::create([
                    'mutu' => $mutu,
                    'pasir' => $pasir,
                    'dust' => $dust,
                    'split' => $split,
                    'additive_d' => $additive_d,
                    'additive_f' => $additive_f,
                    'additive_1g' => $additive_1g,
                    'additive_2g' => $additive_2g,
                    'semen' => $semen,
                    'fly_ash' => $fly_ash,
                    'air' => $air,
                ]);
                break;
        }
        return redirect()->route('list-jobmix')->with('success', 'Delivery created successfully.');
    }

    public function edit_fa($id)
    {
        $fa = FA::find($id);

        if (!$fa) {
            return redirect()->route('list-jobmix')->with('error', 'Data tidak ditemukan.');
        }

        return view('pages.jobmix.editfa', compact('fa'));
    }

    public function update_fa(Request $request, $id)
    {
        $fa = FA::find($id);

        if (!$fa) {
            return redirect()->route('list-jobmix')->with('error', 'Data tidak ditemukan.');
        }

        $fa->update([
            'mutu' => $request->input('mutu'),
            'pasir' => $request->input('pasir'),
            'dust' => $request->input('dust'),
            'split' => $request->input('split'),
            'additive' => $request->input('additive'),
            'semen' => $request->input('semen'),
            'fly_ash' => $request->input('fly_ash'),
        ]);

        return redirect()->route('list-jobmix')->with('success', 'Data berhasil diperbarui.');
    }

    public function edit_nfa($id)
    {
        $nfa = NFA::find($id);

        if (!$nfa) {
            return redirect()->route('list-jobmix')->with('error', 'Data tidak ditemukan.');
        }

        return view('pages.jobmix.editnfa', compact('nfa'));
    }

    public function update_nfa(Request $request, $id)
    {
        $nfa = NFA::find($id);

        if (!$nfa) {
            return redirect()->route('list-jobmix')->with('error', 'Data tidak ditemukan.');
        }

        $nfa->update([
            'mutu' => $request->input('mutu'),
            'pasir' => $request->input('pasir'),
            'dust' => $request->input('dust'),
            'split' => $request->input('split'),
            'additive' => $request->input('additive'),
            'semen' => $request->input('semen'),
        ]);

        return redirect()->route('list-jobmix')->with('success', 'Data berhasil diperbarui.');
    }


    public function edit_special($id)
    {
        $special = Special::find($id);

        if (!$special) {
            return redirect()->route('list-jobmix')->with('error', 'Data tidak ditemukan.');
        }

        return view('pages.jobmix.editspecial', compact('special'));
    }

    public function update_special(Request $request, $id)
    {
        $special = Special::find($id);

        if (!$special) {
            return redirect()->route('list-jobmix')->with('error', 'Data tidak ditemukan.');
        }

        $special->update([
            'mutu' => $request->input('mutu'),
            'pasir' => $request->input('pasir'),
            'dust' => $request->input('dust'),
            'split' => $request->input('split'),
            'additive' => $request->input('additive'),
            'semen' => $request->input('semen'),
            'fly_ash' => $request->input('fly_ash'),
        ]);

        return redirect()->route('list-jobmix')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroyfa($id)
    {
        $stock = FA::find($id);
        $stock->delete();
        return redirect()->route('list-jobmix')->with('success', 'Stock updated successfully.');
    }

    public function destroynfa($id)
    {
        $stock = NFA::find($id);
        $stock->delete();
        return redirect()->route('list-jobmix')->with('success', 'Stock updated successfully.');
    }

    public function destroyspecial($id)
    {
        $stock = Special::find($id);
        $stock->delete();
        return redirect()->route('list-jobmix')->with('success', 'Stock updated successfully.');
    }
}
