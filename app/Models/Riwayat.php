<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cust',
        'id_event',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_cust');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }


}
