<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_eo',
        'uuid',
        'nama_event',
        'sinopsis',
        'deskripsi',
        'lokasi',
        'max_buy',
        'buka_regis',
        'tutup_regis',
        'mulai_event',
        'selesai_event',
        'img_url',
        'visibility',
        'soft_delete'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = fake()->uuid;
        });
    }

    public function eo()
    {
        return $this->belongsTo(EO::class, 'id_eo');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_event');
    }

    public function riwayats()
    {
        return $this->hasMany(Order::class, 'id_event');
    }
}
