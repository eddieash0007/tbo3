<?php

use Illuminate\Database\Seeder;

class BigCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bigcategory1 = App\BigCategory::create([
            'name' => 'Men',
            'slug' => 'men'
        ]);

        $bigcategory2 = App\BigCategory::create([
            'name' => 'Women',
            'slug' => 'women'
        ]);

        $bigcategory3 = App\BigCategory::create([
            'name' => 'Kids',
            'slug' => 'kids'
        ]);
        $bigcategory4 = App\BigCategory::create([
            'name' => 'Accessories',
            'slug' => 'accessories'
        ]);
    }
}
