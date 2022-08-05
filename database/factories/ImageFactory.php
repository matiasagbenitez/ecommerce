<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    public function definition()
    {
        return [
            'url' => 'products/' . $this->faker->image('storage/app/public/products', 640, 480, null, false)
        ];
    }
}
