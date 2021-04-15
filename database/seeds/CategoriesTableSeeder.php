<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = App\Category::create([
            'name' => 'Skirt',
            'big_category_id' => 2,
            'slug' => 'skirt'
        ]);

        $category2 = App\Category::create([
            'name' => 'Dress',
            'big_category_id' => 2,
            'slug' => 'dress'
        ]);

        $category3 = App\Category::create([
            'name' => 'RC Drones',
            'big_category_id' => 3,
            'slug' => 'rc-drones'
        ]);

        $category4 = App\Category::create([
            'name' => 'Trousers',
            'big_category_id' => 1,
            'slug' => 'trousers'
        ]);

        $category4 = App\Category::create([
            'name' => 'Watches',
            'big_category_id' => 4,
            'slug' => 'watches'
        ]);
    }
}
