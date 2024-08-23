<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Models\DetailOrder;
use App\Models\LogActivity;
use App\Models\Order;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
         // Ambil data untuk 7 hari terakhir
        $cashflow = CashFlow::where('tanggal', '>=', Carbon::now()->subDays(7)->format('Y-m-d'))
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('tanggal')
            ->map(function ($group) {
                return $group->sortByDesc('created_at')->first(); // Ambil data terakhir dari setiap hari berdasarkan created_at
            })
            ->values(); // Reset key index

        // Mengambil data untuk view
        $data = $cashflow->map(function ($item) {
            return [
                'tanggal' => $item->tanggal,
                'saldo' => $item->saldo,
            ];
        });
        
        $stocks = Stock::all();

        return view('pages.index', ['data' => $data, 'stocks' => $stocks]);
    }
}
