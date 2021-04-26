<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Promo1 = App\Promotion::create([
            'promotion' => 'New',
            'colour' => '#6BBB25',
            
        ]);

        $Promo2 = App\Promotion::create([
            'promotion' => 'Sale',
            'colour' => '#BB3925',
           
        ]);

        $Promo3 = App\Promotion::create([
            'promotion' => 'Easter Sale',
            'colour' => '#25BBBB',
           
        ]);

        $Promo4 = App\Promotion::create([
            'promotion' => 'Clearance',
            'colour' => '#AB25BB',
            
        ]);

        $Promo4 = App\Promotion::create([
            'promotion' => 'Black Fiday',
            'colour' => '#AB25BB',
            
        ]);
    }
}
