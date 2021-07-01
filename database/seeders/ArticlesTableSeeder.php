<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        DB::table('articles')->truncate();

        $faker = \Faker\Factory::create();

        // Let's create a few articles in our database
        for($i = 0; $i < 50; $i++) {
            DB::table('articles')->insert([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
            ]);
        }
    }
}
