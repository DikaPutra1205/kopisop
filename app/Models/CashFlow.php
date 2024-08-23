<?php

namespace App\Models;

use App\Traits\TracksUserActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    use HasFactory;
    protected $table = 'cash_flow';
    public $timestamps = true;
    use TracksUserActivity;

    protected $fillable = [
        'id',
        'tanggal',
        'akun',
        'berita',
        'keterangan',
        'dana_masuk',
        'dana_keluar',
        'saldo',
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
