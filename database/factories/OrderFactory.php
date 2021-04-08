<?php

namespace Database\Factories;

use App\Enums\Hall;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone_number'  => $this->faker->e164PhoneNumber,
            'number_of_guests'  => rand(10,200),
            'hall_type'  => Hall::getRandomValue(),
            'event_time'  => date('H:i:s', rand(1,54000)),
            'event_date'  => $this->faker->date('Y-m-d', '1461067200'),
            'comments'  => $this->faker->sentence,
        ];
    }
}
