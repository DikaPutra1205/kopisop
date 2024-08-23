<?php

namespace App\Exports;

use App\Models\CashFlow;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CashFlowExport implements FromCollection, WithHeadings, WithStyles, WithMapping
{
    public function collection()
    {
        $cashflows = CashFlow::orderBy('tanggal', 'asc')->get();

        $saldo = 0;
        $data = $cashflows->map(function ($item) use (&$saldo) {
            return [
                'tanggal' => $item->tanggal,
                'akun' => $item->akun,
                'berita' => $item->berita,
                'keterangan' => $item->keterangan,
                'dana_masuk' => ($item->dana_masuk ?? 0),
                'dana_keluar' => ($item->dana_keluar ?? 0),
                'saldo' => $item->saldo,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Akun',
            'Berita',
            'Keterangan',
            'Dana Masuk',
            'Dana Keluar',
            'Saldo',
        ];
    }

    public function map($row): array
    {
        return [
            $row['tanggal'],
            $row['akun'],
            $row['berita'],
            $row['keterangan'],
            'Rp ' . number_format($row['dana_masuk'], 0, ',', '.'),
            'Rp ' . number_format($row['dana_keluar'], 0, ',', '.'),
            'Rp ' . number_format($row['saldo'], 0, ',', '.'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}
