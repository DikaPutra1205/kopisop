<?php

namespace App\Models;

use App\Traits\TracksUserActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianMaterial extends Model
{
    use HasFactory;
    use TracksUserActivity;
    protected $table = 'pembelian_material';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'tanggal_po',
        'tanggal_kirim',
        'vendor',
        'no_po',
        'material',
        'qty',
        'harga_include',
        'total_po_keluar',
        'ket_payment',
        'bayar',
        'tgl_bayar',
        'kurang_bayar',
        'ket',
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
