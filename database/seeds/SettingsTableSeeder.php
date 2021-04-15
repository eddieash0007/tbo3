<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = App\Setting::create([
            'site_name' => 'The Barbie Outlet',
            'contact_email' => 'info@tbo.com',
            'contact_number' => '+233 20 1234 5678',
            'address' => '#1 Accra Business District',
            'logo' => 'uploads/logo/logo.jpg',
            
        ]);
    }
}
