<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paidtix extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_detail',
        'token',
        'status_tiket'
    ];

    public function orderdetail()
    {
        return $this->belongsTo(OrderDetail::class, 'id_detail');
    }
}
