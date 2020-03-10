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
            'name_company' => "Sillips",
            'name_reviewer' => "Piet Peters",
            'body' => "Het Challenge programma is een goede studentenvereniging. We hebben samen een goede dag gehad en veel van elkaar geleerd.",
            'rating' => 8
        ]);

        DB::table('review')->insert([
            'name_company' => "Phiny",
            'name_reviewer' => "Jan Versteeg",
            'body' => "Goede workshop gehad met een aantal leden van het Challenge programma. Goed georganiseerd door het bestuur.",
            'rating' => 8
        ]);

        DB::table('review')->insert([
            'name_company' => "ALMS",
            'name_reviewer' => "Rinaldo Romijn",
            'body' => "Goed afgesproken, duidelijk overleg van te voren. Leuke groep studenten, in de toekomst komen er sowieso meer samenwerkingen.",
            'rating' => 9
        ]);

        DB::table('review')->insert([
            'name_company' => "Rinaltco",
            'name_reviewer' => "Badr Bender",
            'body' => "Uiteindelijk een leuke workshop gehad. Het regelen verliep iets minder soepel en de organisatie ook.",
            'rating' => 6
        ]);

    }
}
