<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_event',
        'nama_tiket',
        'harga',
        'kuota',
    ];

    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_tiket');
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, OrderDetail::class, 'id_tiket', 'id', 'id', 'id_order');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
