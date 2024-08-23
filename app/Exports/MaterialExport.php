<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MaterialExport implements FromCollection, WithHeadings, WithMapping
{
    protected $material;

    public function __construct($material)
    {
        $this->material = $material;
    }

    public function collection()
    {
        return collect([$this->material]);
    }

    public function headings(): array
    {
        return [
            'Tanggal PO',
            'Tanggal Kirim',
            'Vendor',
            'No PO',
            'Material',
            'QTY',
            'Harga Include',
            'Total PO Keluar',
            'Ket Payment',
            'Bayar',
            'Tanggal Bayar',
            'Kurang Bayar',
            'Ket'
        ];
    }

    public function map($row): array
    {
        return [
            $row->tanggal_po,
            $row->tanggal_kirim,
            $row->vendor,
            $row->no_po,
            $row->material,
            $row->qty,
            'Rp ' . number_format($row->harga_include, 0, ',', '.'),
            'Rp ' . number_format($row->total_po_keluar, 0, ',', '.'),
            $row->ket_payment,
            'Rp ' . number_format($row->bayar, 0, ',', '.'),
            $row->tgl_bayar,
            'Rp ' . number_format($row->kurang_bayar, 0, ',', '.'),
            $row->ket
        ];
    }
}
