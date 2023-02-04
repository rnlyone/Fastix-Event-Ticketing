<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EO;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Riwayat;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        EO::factory(3)->create();
        Event::factory(10)->create();
        Riwayat::factory(10)->create();
        Ticket::factory(50)->create();
        // Order::factory(50)->create();
        // OrderDetail::factory(100)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
