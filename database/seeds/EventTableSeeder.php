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
            'name' => 'Main event',
            'description' => 'dit is het main event',
            'points' => '6',
            'street' => 'Onderwijsboulevard',
            'city' => 'Den Bosch',
            'house_number' => '215',
            'zipcode' => '5223DE',
            'event_start_date_time' => date('Y-m-d H:i:s'),
            'event_end_date_time' => date('Y-m-d H:i:s'),
            'is_accepted' => false,
            'max_students' => '5',
            'user_id' => '1',
        ]);
    }
}
