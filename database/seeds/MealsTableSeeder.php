<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $items = [

            ['title' => 'kokošja juha', 'slug' => 'kokosja-juha','description' => 'domaća juha od kokoši', 'language_id' => '3','category_id' => '35'],
            ['title' => 'paradajz juha', 'slug' => 'paradajz-juha','description' => 'domaća juha od paradajza', 'language_id' => '3','category_id' => '35'],
            ['title' => 'Gljive juha', 'slug' => 'gljive-juha','description' => 'domaća juha od gljiva', 'language_id' => '3','category_id' => '35'],
            ['title' => 'Povrtna juha', 'slug' => 'povrtna-juha','description' => 'domaća juha odpovrća', 'language_id' => '3','category_id' => '35'],

        ];

        foreach ($items as $item) {
            \App\Meal::create($item);
        }

        $faker = Faker::create('App\Meal');

        $limit = 15;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('meals')->insert([
                'title' => $faker->unique()->sentence(6),
                'slug' => $faker->unique()->slug,
                'description' => $faker->sentence,
                'category_id' => $faker->numberBetween($min = 34, $max = 40),
                'language_id' => $faker->numberBetween($min = 1, $max = 4),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()

            ]);
    }
}}
