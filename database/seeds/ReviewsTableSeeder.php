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
            'body' => "Deze review moet worden verwijderd.",
            'rating' => 10,
            'user_id' => 2,
        ]);

        DB::table('review')->insert([
            'body' => "Het Challenge programma is een goede studentenvereniging. We hebben samen een goede dag gehad en veel van elkaar geleerd.",
            'rating' => 8,
            'user_id' => 2,
        ]);

        DB::table('review')->insert([
            'body' => "Goede workshop gehad met een aantal leden van het Challenge programma. Goed georganiseerd door het bestuur.",
            'rating' => 8,
            'user_id' => 2,
        ]);

        DB::table('review')->insert([
            'body' => "Goed afgesproken, duidelijk overleg van te voren. Leuke groep studenten, in de toekomst komen er sowieso meer samenwerkingen.",
            'rating' => 9,
            'user_id' => 2,
        ]);

        DB::table('review')->insert([
            'body' => "Uiteindelijk een leuke workshop gehad. Het regelen verliep iets minder soepel en de organisatie ook.",
            'rating' => 6,
            'user_id' => 2,
        ]);
    }
}
