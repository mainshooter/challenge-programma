<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
          'name' => 'site',
          'created_at' => '2020-05-08 12:10:40',
          'updated_at' => '2020-05-08 12:10:40',
        ]);
    }
}
