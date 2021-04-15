<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Edwin Ashie',
            'email' => 'eddash@eddmail.com',
            'password' => bcrypt('password'),
            'admin' =>1
        ]);

        $user1 = App\User::create([
            'name' => 'Isaac Armah',
            'email' => 'ia@eddmail.com',
            'password' => bcrypt('password'),
            'admin' =>2
        ]);
    }
}
