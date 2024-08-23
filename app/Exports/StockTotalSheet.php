<?php

namespace App\Exports;

use App\Models\StockTotal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class StockTotalSheet implements FromCollection, WithHeadings, WithTitle
{
    protected $konversi;

    public function __construct($konversi)
    {
        $this->konversi = $konversi;
    }

    public function collection()
    {
        return StockTotal::all()->map(function ($total) {
            return [
                $total->pasir_cilegon / $this->konversi->pasir,
                $total->pasir_tayan / $this->konversi->pasir,
                $total->split_10_20 / $this->konversi->split,
                $total->split_screening / $this->konversi->screening,
                $total->fly_ash / 1000,
                $total->semen_hc / 1000,
                $total->semen_opc / 1000,
                $total->abu_batu / 1000,
                $total->additive_d,
                $total->additive_f,
                $total->additive_1g,
                $total->additive_2g,
                $total->air,
                $total->solar,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Pasir Cilegon',
            'Pasir Tayan',
            'Split 10-20',
            'Split Screening',
            'Fly Ash',
            'Semen HC',
            'Semen OPC',
            'Abu Batu',
            'Additive D',
            'Additive F',
            'Additive 1G',
            'Additive 2G',
            'Air',
            'Solar',
        ];
    }

    public function title(): string
    {
        return 'Total Stock';
    }
}
