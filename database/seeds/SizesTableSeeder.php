<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Size1 = App\Size::create([
            'size' => 'Size 6'
        ]);

        $Size2 = App\Size::create([
            'size' => 'Size 8'
        ]);

        $Size3 = App\Size::create([
            'size' => 'Size 10'
        ]);

        $Size4 = App\Size::create([
            'size' => 'Size 12'
        ]);

        $Size5 = App\Size::create([
            'size' => 'Size 14'
        ]);

        $Size6 = App\Size::create([
            'size' => 'Size 16'
        ]);
    }
}
