<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = App\Product::create([
            'name' => 'Flair Skirt',
            'category_id' => 2,
            'image' => 'uploads/product/16184865266.jpg',
            'price' => 12,
            'colour' => '#AB25BB ',
            'slug' => 'flair_skirt',
            'details' => 'dfaksdfhjba'
        ]);

        $product2 = App\Product::create([
            'name' => 'White Shirt',
            'category_id' => 5,
            'image' => 'uploads/product/16184865266.jpg',
            'price' => 34,
            'colour' => '#AB25BB ',
            'slug' => 'white_shirt',
            'details' => 'dfaksdfhjba'
        ]);

        $product3 = App\Product::create([
            'name' => 'White Shirt',
            'category_id' => 5,
            'image' => 'uploads/product/16184865266.jpg',
            'price' => 23,
            'colour' => '#AB25BB ',
            'slug' => 'white_shirt',
            'details' => 'dfaksdfhjba'
        ]);

        $product4 = App\Product::create([
            'name' => 'White Shirt',
            'category_id' => 1,
            'image' => 'uploads/product/16184865266.jpg',
            'price' => 56,
            'colour' => '#AB25BB ',
            'slug' => 'white_shirt',
            'details' => 'dfaksdfhjba'
        ]);

        $product5 = App\Product::create([
            'name' => 'White Shirt',
            'category_id' => 3,
            'image' => 'uploads/product/16184865266.jpg',
            'price' => 76,
            'colour' => '#AB25BB ',
            'slug' => 'white_shirt',
            'details' => 'dfaksdfhjba'
        ]);

        $product6 = App\Product::create([
            'name' => 'White Shirt',
            'category_id' => 4,
            'image' => 'uploads/product/16184865266.jpg',
            'price' => 89,
            'colour' => '#AB25BB ',
            'slug' => 'white_shirt',
            'details' => 'dfaksdfhjba'
        ]);
        $product7 = App\Product::create([
            'name' => 'White Shirt',
            'category_id' => 4,
            'image' => 'uploads/product/16184865266.jpg',
            'price' => 23,
            'colour' => '#AB25BB ',
            'slug' => 'white_shirt',
            'details' => 'dfaksdfhjba'
        ]);
        $product8 = App\Product::create([
            'name' => 'White Shirt',
            'category_id' => 5,
            'image' => 'uploads/product/16184865266.jpg',
            'price' => 89,
            'colour' => '#AB25BB ',
            'slug' => 'white_shirt',
            'details' => 'dfaksdfhjba'
        ]);
    }
}
