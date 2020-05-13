<?php

use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_items')->insert([
          'label' => 'Home',
          'link' => '/',
          'parent' => 0,
          'menu' => 1,
          'depth' => 0,
          'created_at' => '2020-05-08 12:11:07',
          'updated_at' => '2020-05-08 12:30:33',
        ]);
        DB::table('menu_items')->insert([
          'label' => 'Reviews',
          'link' => '/reviews',
          'parent' => 0,
          'menu' => 1,
          'depth' => 0,
          'created_at' => '2020-05-08 12:11:07',
          'updated_at' => '2020-05-08 12:30:33',
        ]);
        DB::table('menu_items')->insert([
          'label' => 'Agenda',
          'link' => '/agenda',
          'parent' => 0,
          'menu' => 1,
          'depth' => 0,
          'created_at' => '2020-05-08 12:11:07',
          'updated_at' => '2020-05-08 12:30:33',
        ]);
        DB::table('menu_items')->insert([
          'label' => 'Fotoalbum',
          'link' => '/photoalbum',
          'parent' => 0,
          'menu' => 1,
          'depth' => 0,
          'created_at' => '2020-05-08 12:11:07',
          'updated_at' => '2020-05-08 12:30:33',
        ]);
    }
}
