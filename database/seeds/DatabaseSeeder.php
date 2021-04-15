<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(BigCategoriesSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(PromotionsTableSeeder::class);
         $this->call(SizesTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(SettingsTableSeeder::class);

       
    }
}
