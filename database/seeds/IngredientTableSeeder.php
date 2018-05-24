<?php

use Illuminate\Database\Seeder;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['title' => 'Sol', 'slug' => 'sol', 'language_id' => '3',],
            ['title' => 'Papar', 'slug' => 'riza', 'language_id' => '3',],
            ['title' => 'Luk', 'slug' => 'luk', 'language_id' => '3',],
            ['title' => 'Paradajz', 'slug' => 'paradajz', 'language_id' => '3',],
            ['title' => 'Kulen', 'slug' => 'kulen', 'language_id' => '3',],

        ];

        foreach ($items as $item) {
            \App\Ingredient::create($item);
        }

        $faker = Faker\Factory::create();


        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('ingredients')->insert([ //,
                'title' => $faker->unique()->word,
                'slug' => $faker->unique()->slug,
                'language_id' => $faker->numberBetween($min = 1, $max = 4),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
