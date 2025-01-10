<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Comida', 'Transporte', 'Ocio', 'Hogar', 'Salud'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
