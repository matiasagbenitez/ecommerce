<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $subcategories = [
            /* Celulares y tablets */
            [
                'category_id' => 1,
                'name' => 'Smartphones and tablets',
                'slug' => Str::slug('Smartphones and tablets'),
                'color' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Smartphone accessories',
                'slug' => Str::slug('Smartphone accessories'),
            ],

            [
                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),
            ],

            /* TV, audio y video */

            [
                'category_id' => 2,
                'name' => 'TV and audio',
                'slug' => Str::slug('TV and audio'),
            ],
            [
                'category_id' => 2,
                'name' => 'Audio',
                'slug' => Str::slug('Audio'),
            ],

            [
                'category_id' => 2,
                'name' => 'Car audio',
                'slug' => Str::slug('Car audio'),
            ],

            /* Consola y videojuegos */
            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),
            ],

            [
                'category_id' => 3,
                'name' => 'Play Station',
                'slug' => Str::slug('Play Station'),
            ],

            [
                'category_id' => 3,
                'name' => 'PC video games',
                'slug' => Str::slug('PC video games'),
            ],

            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
            ],

            /* Computación */

            [
                'category_id' => 4,
                'name' => 'Laptops',
                'slug' => Str::slug('Laptops'),
            ],

            [
                'category_id' => 4,
                'name' => 'Desktop PC',
                'slug' => Str::slug('Desktop PC'),
            ],

            [
                'category_id' => 4,
                'name' => 'Storage',
                'slug' => Str::slug('Storage'),
            ],

            [
                'category_id' => 4,
                'name' => 'Computer accessories',
                'slug' => Str::slug('Computer accessories'),
            ],

            /* Moda */
            [
                'category_id' => 5,
                'name' => 'Women',
                'slug' => Str::slug('Women'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 5,
                'name' => 'Men',
                'slug' => Str::slug('Men'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 5,
                'name' => 'Glasses',
                'slug' => Str::slug('Glasses'),
            ],

            [
                'category_id' => 5,
                'name' => 'Watches',
                'slug' => Str::slug('Watches'),
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
