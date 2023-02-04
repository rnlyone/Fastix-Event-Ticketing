<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user' => User::where('role', 'EO')->inRandomOrder()->first()->id,
            'nama_lengkap' => fake()->name,
            'jk' => fake()->randomElement(['l', 'p']),
            'tgl_lahir' => fake()->date(),
        ];
    }
}
