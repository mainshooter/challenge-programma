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
            'firstname' => encrypt('admin'),
            'lastname' => encrypt('admin'),
            'phone' => '0612365874',
            'is_accepted' => true,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'firstname' => encrypt('bedrijf'),
            'lastname' => encrypt('bedrijf'),
            'phone' => '0612365874',
            'is_accepted' => false,
            'email' => 'bedrijf'.'@gmail.com',
            'password' => bcrypt('bedrijf'),
            'role' => 'company',
          ]);

        DB::table('users')->insert([
          'firstname' => encrypt('HBO'),
          'lastname' => encrypt('Avans'),
          'phone' => '0885257500',
          'is_accepted' => true,
          'email' => 'avans@gmail.com',
          'password' => bcrypt('avans'),
          'role' => 'company',
        ]);
        DB::table('users')->insert([
          'firstname' => encrypt('student'),
          'lastname' => encrypt('student'),
          'phone' => '0625859658',
          'is_accepted' => true,
          'email' => 'student@gmail.com',
          'password' => bcrypt('student'),
          'role' => 'student',
        ]);
        DB::table('users')->insert([
          'firstname' => encrypt('Uitschrijven'),
          'lastname' => encrypt('student'),
          'phone' => '0638576398',
          'is_accepted' => true,
          'email' => 'uitschrijven@gmail.com',
          'password' => bcrypt('student'),
          'role' => 'student',
        ]);

        DB::table('users')->insert([
            'firstname' => encrypt('content'),
            'lastname' => encrypt('writer'),
            'phone' => '0612365874',
            'is_accepted' => true,
            'email' => 'content@gmail.com',
            'password' => bcrypt('content'),
            'role' => 'content-writer',
        ]);

        DB::table('company_info')->insert([
          'user_id' => 2,
          'company_name' => 'Avans',
          'street' => 'Onderwijs boulevard',
          'city' => 'Den Bosch',
          'house_number' => 215,
          'zipcode' => '5223DE',
        ]);

        DB::table('company_info')->insert([
          'user_id' => 3,
          'company_name' => 'Avans',
          'street' => 'Onderwijs boulevard',
          'city' => 'Den Bosch',
          'house_number' => 215,
          'zipcode' => '5223DE',
        ]);

        DB::table('student_info')->insert([
            'user_id' => 4,
            'school_year' => 1,
            'points_decision' => 'vsr',
        ]);
        DB::table('student_info')->insert([
          'school_year' => 1,
          'points_decision' => 'vsr',
          'user_id' => 5,
        ]);
    }
}
