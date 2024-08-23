<?php

namespace App\Exports;

use App\Models\Stock;
use App\Models\StockTotal;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StocksExport implements WithMultipleSheets
{
    protected $konversi;

    public function __construct($konversi)
    {
        $this->konversi = $konversi;
    }

    public function sheets(): array
    {
        return [
            new StockSheet($this->konversi),
            new StockTotalSheet($this->konversi),
        ];
    }
}


