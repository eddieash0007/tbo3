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
            'about' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using , making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for  will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'
        ]);
    }
}
