<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'username',
        'email',
        'no_hp',
        'password',
        'profile_pict'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id_user');
    }

    public function eo()
    {
        return $this->hasOne(EO::class, 'id_user');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_cust');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'id_eo');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'id_cust');
    }

    public function riwayats()
    {
        return $this->hasMany(Order::class, 'id_event');
    }

    public static function create(array $attributes = [])
    {
        if (static::where('id', $attributes['id'])->exists()) {
            if(static::where('id', $attributes['id'])->has('Customer')->first()){
                throw new Exception('User already have record in Customer');
            }elseif(static::where('id', $attributes['id'])->has('EO')->first()){
                throw new Exception('User already have record in EO');
            }
        }
        return parent::create($attributes);
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

}
