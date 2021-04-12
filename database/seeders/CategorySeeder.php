<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'  => 'Starters',
                'icon'  => '/salad.svg',
            ],
            [
                'name'  => 'Main',
                'icon'  => '/desert.svg',
            ],
            [
                'name'  => 'Deserts',
                'icon'  => '/steak.svg',
            ],
            [
                'name'  => 'Cocktails',
                'icon'  => '/cocktail.svg',
            ],
            [
                'name'  => 'Wine',
                'icon'  => '/wine.svg',
            ],
            [
                'name'  => 'Beer',
                'icon'  => '/beer-mug.svg',
            ],
        ];

        foreach ($categories as $category) {
            Category::factory()
                    ->has(Menu::factory()->count(6))
                    ->create($category);
        }

        // Category::factory()
        //     ->has(Menu::factory()->count(6))
        //     ->count(6)
        //     ->create();
    }
}
