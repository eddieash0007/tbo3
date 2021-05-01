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
            'slug' => 'skirt',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable'
        ]);

        $category2 = App\Category::create([
            'name' => 'Dress',
            'big_category_id' => 2,
            'slug' => 'dress',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable'
        ]);

        $category3 = App\Category::create([
            'name' => 'RC Drones',
            'big_category_id' => 3,
            'slug' => 'rc-drones',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable'
        ]);

        $category4 = App\Category::create([
            'name' => 'Trousers',
            'big_category_id' => 1,
            'slug' => 'trousers',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable'
        ]);

        $category4 = App\Category::create([
            'name' => 'Watches',
            'big_category_id' => 4,
            'slug' => 'watches',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable'
        ]);
    }
}
