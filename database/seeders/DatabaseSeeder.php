<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SizeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\File;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\SubcategorySeeder;
use Illuminate\Support\Facades\Storage;
use Database\Seeders\ColorProductSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);

        Storage::deleteDirectory('categories');
        Storage::makeDirectory('categories');
        $this->call(CategorySeeder::class);

        Storage::deleteDirectory('subcategories');
        Storage::makeDirectory('subcategories');
        $this->call(SubcategorySeeder::class);

        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');
        $this->call(ProductSeeder::class);

        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);

        $this->call(SizeSeeder::class);
        $this->call(ColorSizeSeeder::class);

        $this->call(DepartmentSeeder::class);
    }
}
