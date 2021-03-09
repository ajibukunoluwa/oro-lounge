<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = User::factory()
                        ->has(Event::factory()->count(5))
                        ->count(6)
                        ->create();


        // $events = Event::factory()->count(10)->create();
    }
}
