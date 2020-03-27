<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'phone' => '0612365874',
            'is_accepted' => true,
            'email' => 'admin'.'@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'firstname' => 'bedrijf',
            'lastname' => 'bedrijf',
            'phone' => '0612365874',
            'is_accepted' => false,
            'email' => 'bedrijf'.'@gmail.com',
            'password' => bcrypt('bedrijf'),
            'role' => 'company',
        ]);
    }
}
