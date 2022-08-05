<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = ['white', 'blue', 'red', 'black', 'gray', 'indigo'];

        foreach ($colors as $color) {
            Color::create([
                'name' => $color
            ]);
        }
    }
}
