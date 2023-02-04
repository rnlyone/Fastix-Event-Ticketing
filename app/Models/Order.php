<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'id_cust',
        'jumlah_bayar',
        'detail_order',
        'status_bayar',
    ];

    public function cust()
    {
        return $this->belongsTo(User::class, 'id_cust');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'id_order');
    }
}
