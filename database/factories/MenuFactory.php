<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $categories = Category::factory()->create();

        return [
            // 'category_id' => $categories->id,
            'name' => $this->faker->name,
            'ingredients' => $this->faker->sentence,
            'price' => $this->faker->randomDigit,
        ];
    }
}
