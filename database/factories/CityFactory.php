<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'cost' => $this->faker->randomElement([5, 10, 15])
        ];
    }
}
