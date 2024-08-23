<?php

namespace App\Exports;

use App\Models\Delivery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DeliveriesExport implements FromCollection, WithHeadings, WithStyles, WithTitle, WithMapping
{
    public function collection()
    {
        return Delivery::all(); // Atau sesuaikan dengan query yang diperlukan
    }

    public function headings(): array
    {
        return [
            'Number',
            'Kode Sales',
            'Nama Sales',
            'Nama Pelanggan',
            'Info Kontak Pelanggan',
            'Pelanggan Baru/Lama',
            'Alamat Kirim',
            'Tanggal Kirim',
            'Jam Kirim',
            'Mutu Beton (Jenis Armada)',
            'FA/NFA',
            'Slump',
            'Harga Include PPN',
            'Volume',
            'Metode Bongkar',
            'Media Cor',
            'Cara Bayar',
            'Jumlah bayar',
            'Jarak Plan - Lokasi Proyek',
            'Titipan',
            'Diinput Oleh',
            'Diubah Oleh',
            'Pemakaian Aktual',
        ];
    }

    public function map($delivery): array
    {
        return [
            // Sesuaikan mapping dengan kolom yang ada di tabel Anda
            $delivery->id,
            $delivery->kode_sales,
            $delivery->nama_sales,
            $delivery->nama_pelanggan,
            $delivery->kontak_pelanggan,
            $delivery->pelanggan_baru_lama,
            $delivery->alamat_kirim,
            $delivery->tanggal_kirim,
            $delivery->jam_kirim,
            $delivery->mutu_beton . ' (' . $delivery->armada . ')',
            $delivery->fa_nfa,
            $delivery->slump,
            $delivery->harga_ppn,
            $delivery->volume,
            $delivery->metode_bongkar,
            $delivery->media_cor,
            $delivery->cara_bayar,
            $delivery->jumlah_bayar,
            $delivery->jarak_lokasi,
            $delivery->titipan,
            $delivery->createdBy->nama ?? '-',
            $delivery->updatedBy->nama ?? '-',
            $delivery->aktual ?? '-',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:V1')->getFont()->setBold(true);
        $sheet->getStyle('A1:V1')->getAlignment()->setHorizontal('center');
    }

    public function title(): string
    {
        return 'Deliveries Order';
    }
}

