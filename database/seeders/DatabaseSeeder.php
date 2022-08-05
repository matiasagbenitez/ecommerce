<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\File;
use Database\Seeders\SubcategorySeeder;
use Illuminate\Support\Facades\Storage;

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

        $this->call(ProductSeeder::class);
    }
}
