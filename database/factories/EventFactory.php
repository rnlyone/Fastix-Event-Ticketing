<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $buka_regis = fake()->dateTimeBetween('-1 month', '+1 month');
        $tutup_regis = fake()->dateTimeBetween($buka_regis, '+1 month');
        $mulai_event = fake()->dateTimeBetween($tutup_regis, '+1 month');
        $selesai_event = fake()->dateTimeBetween($mulai_event, '+1 month');

        return [
            'uuid' => fake()->uuid(),
            'id_eo' => User::where('role', 'EO')->inRandomOrder()->first()->id,
            'nama_event' => fake()->sentence(3),
            'sinopsis' => fake()->text,
            'deskripsi' => fake()->text,
            'lokasi' => fake()->address,
            'max_buy' => '1',
            'buka_regis' => $buka_regis,
            'tutup_regis' => $tutup_regis,
            'mulai_event' => $mulai_event,
            'selesai_event' => $selesai_event,
            'img_url' => fake()->imageUrl(1080, 1920, 'event'),
            'visibility' => fake()->boolean,
            'soft_delete' => fake()->boolean,
        ];
    }
}
