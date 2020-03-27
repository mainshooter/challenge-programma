<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event')->insert([
            'name' => 'Super evenement',
            'description' => 'super',
            'points' => '2',
            'street' => 'de straat',
            'city' => 'Stad',
            'zipcode' => '6537PN',
            'house_number' => 4,
            'event_start_date_time' => date("Y-m-d"),
            'event_end_date_time' =>date("Y-m-d"),
            'is_accepted' => '1',
            'max_students' => '0',
            'user_id' => '1',
        ]);
    }
}
