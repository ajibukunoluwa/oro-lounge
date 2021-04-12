<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use App\Models\Order;
use App\Models\EventComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user   = User::factory()
                    ->has(Event::factory())
                    ->has(Order::factory())
                    ->create();

        $user->load('events', 'orders');

        return [
            'event_id'  => $user->events[0]->id,
            'order_id'  => $user->orders[0]->id,
        ];
    }
}
