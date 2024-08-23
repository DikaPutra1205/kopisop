<?php

namespace App\Exports;

use App\Models\PembelianMaterial; // Ganti dengan model yang sesuai
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class PembelianMaterialExport implements FromCollection, WithHeadings, WithStyles, WithMapping
{
    public function collection()
    {
        // Ambil semua data pembelian material
        return PembelianMaterial::all();
    }

    public function headings(): array
    {
        return [
            'Number',
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
            'Ket',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
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
            'Rp ' . number_format(max(0, $row->kurang_bayar), 0, ',', '.'),
            $row->ket,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
            // You can add more styles here
        ];
    }
}

