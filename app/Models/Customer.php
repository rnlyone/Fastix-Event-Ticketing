<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'jk',
        'tgl_lahir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
