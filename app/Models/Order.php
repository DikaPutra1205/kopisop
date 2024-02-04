<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'nomor_meja',
        'total',
        'created_by',
        'created_at',
        'updated_at',
    ];

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'detail_orders', 'id_order', 'id_menu')
            ->withPivot('qty');
    }
}
