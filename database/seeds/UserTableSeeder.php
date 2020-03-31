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
          'firstname' => 'HBO',
          'lastname' => 'Avans',
          'phone' => '0885257500',
          'is_accepted' => true,
          'email' => 'avans@gmail.com',
          'password' => bcrypt('avans'),
          'role' => 'company',
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
        DB::table('users')->insert([
          'firstname' => 'Uitschrijven',
          'lastname' => 'student',
          'phone' => '0638576398',
          'is_accepted' => true,
          'email' => 'uitschrijven@gmail.com',
          'password' => bcrypt('student'),
          'role' => 'student',
        ]);
        DB::table('company_info')->insert([
          'user_id' => 2,
          'company_name' => 'Avans',
          'street' => 'Onderwijs boulevard',
          'city' => 'Den Bosch',
          'house_number' => 215,
          'zipcode' => '5223DE',
        ]);

        DB::table('student_info')->insert([
            'user_id' => 3,
            'school_year' => 1,
            'points_decision' => 'vsr',
        ]);
        DB::table('student_info')->insert([
          'school_year' => 1,
          'points_decision' => 'vsr',
          'user_id' => 4,
        ]);
    }
}
