<?php

use Illuminate\Database\Seeder;

class StudentEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_event')->insert([
            'student_id' => 2,
            'event_id' => 1,
        ]);
        DB::table('student_event')->insert([
            'student_id' => 2,
            'event_id' => 2,
        ]);

        DB::table('student_info')->insert([
            'user_id' => 2,
            'school_year' => 2,
            'points_decision' => 'vsr'
        ]);
    }
}
