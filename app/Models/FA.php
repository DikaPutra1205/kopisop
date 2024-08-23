<?php

namespace App\Models;

use App\Traits\TracksUserActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FA extends Model
{
    use HasFactory;
    protected $table = 'fa';
    use TracksUserActivity;
    protected $fillable = [
        'id',
        'mutu',
        'pasir',
        'dust',
        'split',
        'additive_d',
        'additive_f',
        'additive_1g',
        'additive_2g',
        'semen',
        'fly_ash',
        'air',
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
