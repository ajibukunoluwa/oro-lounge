<?php

namespace Database\Factories;

use App\Models\Catering;
use Illuminate\Database\Eloquent\Factories\Factory;

class CateringFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Catering::class;

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
            'comments'  => $this->faker->sentence,
        ];
    }
}
