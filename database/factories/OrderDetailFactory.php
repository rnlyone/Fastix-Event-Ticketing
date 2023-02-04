<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_order' => Order::inRandomOrder()->first()->id,
            'id_cust' => User::where('role', 'cust')->inRandomOrder()->first()->id,
            'id_tiket' => Ticket::inRandomOrder()->first()->id,
            'jumlah' => fake()->numberBetween(1, 10),
        ];
    }
}
