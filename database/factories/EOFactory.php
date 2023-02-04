<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EO>
 */
class EOFactory extends Factory
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
            'nama_eo' => fake()->word,
            'deskripsi_eo' => fake()->text,
            'alamat' => fake()->address,
        ];
    }
}
