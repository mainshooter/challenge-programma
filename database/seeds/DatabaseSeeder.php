<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(StudentEventTableSeeder::class);
    }
}
