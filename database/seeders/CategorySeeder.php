<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Smartphones and tablets',
                'slug' => Str::slug('Smart phones and tablets'),
                'icon' => '<i class="fas fa-mobile-alt"></i>'
            ],
            [
                'name' => 'TV, audio and video',
                'slug' => Str::slug('TV, audio and video'),
                'icon' => '<i class="fas fa-tv"></i>'
            ],

            [
                'name' => 'Consoles and videogames',
                'slug' => Str::slug('Consoles and videogames'),
                'icon' => '<i class="fas fa-gamepad"></i>'
            ],

            [
                'name' => 'Computing',
                'slug' => Str::slug('Computing'),
                'icon' => '<i class="fas fa-laptop"></i>'
            ],

            [
                'name' => 'Fashion',
                'slug' => Str::slug('Fashion'),
                'icon' => '<i class="fas fa-tshirt"></i>'
            ],
        ];

        foreach ($categories as $category) {

            $category = Category::factory(1)->create($category)->first();
            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }
    }
}
