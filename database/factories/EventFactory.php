<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $organizer = User::factory()->make();
        $startDate = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('-1 years', '+1 month')->getTimestamp());

        return [
            // 'organizer_id' => $organizer->id,
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'start_date' => $startDate->toDateTimeString(),
            'end_date' => $startDate->addHours( $this->faker->numberBetween( 1, 18 ) ),
            'status' => EventStatus::getRandomValue(),
        ];
    }
}
