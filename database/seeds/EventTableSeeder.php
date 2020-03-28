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
			'name' => 'Sprint 2 review',
			'description' => 'Sprint 2 review om te kijken of ons product naar wens is',
			'points' => 3,
			'street' => 'Onderwijs boulevard',
			'city' => 'Den Bosch',
			'house_number' => 215,
			'zipcode' => '5223DE',
			'event_start_date_time' => '2020-03-26 00:00:00',
			'event_end_date_time' => '2020-03-27 00:00:00',
			'is_accepted' => true,
			'user_id' => 1,
		]);
		DB::table('event')->insert([
			'name' => 'Sprint 3 review',
			'description' => 'Sprint 3 review om te kijken of ons product naar wens is',
			'points' => 3,
			'street' => 'Onderwijs boulevard',
			'city' => 'Den Bosch',
			'house_number' => 215,
			'zipcode' => '5223DE',
			'event_start_date_time' => '2020-03-26 00:00:00',
			'event_end_date_time' => '2020-03-27 00:00:00',
			'is_accepted' => true,
			'user_id' => 1,
		]);
	}
}
