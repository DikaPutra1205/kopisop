<?php

namespace App\Models;

use App\Traits\TracksUserActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'delivery';
    public $timestamps = true;
    use TracksUserActivity;

    protected $fillable = [
        'kode_sales',
        'nama_sales',
        'nama_pelanggan',
        'kontak_pelanggan',
        'pelanggan_baru_lama',
        'alamat_kirim',
        'tanggal_kirim',
        'jam_kirim',
        'mutu_beton',
        'armada',
        'fa_nfa',
        'slump',
        'harga_ppn',
        'volume',
        'metode_bongkar',
        'media_cor',
        'cara_bayar',
        'jumlah_bayar',
        'jarak_lokasi',
        'aktual',
        'titipan',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
