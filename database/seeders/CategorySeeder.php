<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(
            [
                'name' => 'Commodity Espresso Based',
                'slug' => 'commodity-espresso-based'

            ]
        );
        Category::create(
            [
                'name' => 'Arabika Espresso Based',
                'slug' => 'arabika-espresso-based'

            ]
        );
        Category::create(
            [
                'name' => 'Kopi Susu Blend',
                'slug' => 'kopi-susu-blend'

            ]
        );
        Category::create(
            [
                'name' => 'Arabika Filter Roast',
                'slug' => 'arabika-filter-roast'

            ]
        );
    }
}
