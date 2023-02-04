<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EO extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama_eo',
        'deskripsi_eo',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'id_eo');
    }
}
