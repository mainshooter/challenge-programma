<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review')->insert([
            'name_company' => "Bedrijf nummer 1",
            'name_reviewer' => "Reviewer 1",
            'body' => "Dit is een voorbeeld van hoe een review er uit zou kunnen zien",
            'rating' => rand(1, 10)
        ]);

        DB::table('review')->insert([
            'name_company' => "Bedrijf nummer 2",
            'name_reviewer' => "Reviewer 2",
            'body' => "Dit is een voorbeeld van hoe een review er uit zou kunnen zien",
            'rating' => rand(1, 10)
        ]);

        DB::table('review')->insert([
            'name_company' => "Bedrijf nummer 3",
            'name_reviewer' => "Reviewer 3",
            'body' => "Dit is een voorbeeld van hoe een review er uit zou kunnen zien",
            'rating' => rand(1, 10)
        ]);

        DB::table('review')->insert([
            'name_company' => "Bedrijf nummer 4",
            'name_reviewer' => "Reviewer 4",
            'body' => "Dit is een voorbeeld van hoe een review er uit zou kunnen zien",
            'rating' => rand(1, 10)
        ]);

    }
}
