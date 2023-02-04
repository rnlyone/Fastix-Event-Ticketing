<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => fake()->unique()->uuid(),
            'id_cust' => User::inRandomOrder()->first()->id,
            'jumlah_bayar' => fake()->numberBetween($min = 100000, $max = 1000000),
            'detail_order' => fake()->sentence,
            'status_bayar' => fake()->randomElement(['sukses', 'pending', 'gagal']),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
