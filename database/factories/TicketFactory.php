<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_event' => Event::inRandomOrder()->first(),
            'nama_tiket' => fake()->randomElement(['Premium', 'VIP', 'VVIP', 'First Class']),
            'harga' => fake()->numberBetween(100000, 7000000),
            'kuota' => fake()->randomElement([800, 50, 20, 5]),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
