<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    public function definition()
    {
        return [
            // 'image' => 'categories/' . $this->faker->image('public/storage/categories', 640, 480, null, false)
            'image' => 'categories/' . $this->faker->image('storage/app/public/categories', 640, 480, null, false)
        ];
    }
}
