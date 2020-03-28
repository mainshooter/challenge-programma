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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        
        DB::table('users')->insert([
          'firstname' => 'student',
          'lastname' => 'student',
          'phone' => '0625859658',
          'is_accepted' => true,
          'email' => 'student@gmail.com',
          'password' => bcrypt('student'),
          'role' => 'student',
        ]);
    }
}
