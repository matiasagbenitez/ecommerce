<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'image' => 'subcategories/' . $this->faker->image('storage/app/public/subcategories', 640, 480, null, false)
        ];
    }
}
