<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'id_cust',
        'id_tiket',
        'jumlah',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'id_tiket');
    }

    public function cust()
    {
        return $this->belongsTo(User::class, 'id_cust');
    }

    public function paidtix()
    {
        return $this->hasMany(Paidtix::class, 'id_detail');
    }
}
