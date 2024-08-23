<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class StockSheet implements FromCollection, WithHeadings, WithTitle
{
    protected $konversi;

    public function __construct($konversi)
    {
        $this->konversi = $konversi;
    }

    public function collection()
    {
        return Stock::all()->map(function($item) {
            return [
                $item->periode,
                $item->tanggal,
                $item->pasir_cilegon / $this->konversi->pasir,
                $item->pasir_tayan / $this->konversi->pasir,
                $item->split_10_20 / $this->konversi->split,
                $item->split_screening / $this->konversi->screening,
                $item->fly_ash / 1000,
                $item->semen_hc / 1000,
                $item->semen_opc / 1000,
                $item->abu_batu / 1000,
                $item->additive_d,
                $item->additive_f,
                $item->additive_1g,
                $item->additive_2g,
                $item->air,
                $item->solar,
                $item->createdBy->nama ?? '-',
                $item->updatedBy->nama ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Periode',
            'Tanggal',
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
            'Created By',
            'Updated By',
        ];
    }

    public function title(): string
    {
        return 'Input Stock';
    }
}

