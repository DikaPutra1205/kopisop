<?php

namespace App\Models;

use App\Traits\TracksUserActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    use TracksUserActivity;
    protected $table = 'stock';

    protected $fillable = [
        'periode',
        'tanggal',
        'pasir_cilegon',
        'pasir_tayan',
        'split_10_20',
        'split_screening',
        'fly_ash',
        'semen_hc',
        'semen_opc',
        'abu_batu',
        'additive_d',
        'additive_f',
        'additive_1g',
        'additive_2g',
        'air',
        'solar',
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
