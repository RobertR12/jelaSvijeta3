<?php

use Illuminate\Database\Seeder;

class MealIngTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('meal_ing')->insert([ //,
                'meal_id' => $faker->numberBetween($min = 62, $max = 72),
                'ing_id' => $faker->numberBetween($min = 1, $max = 5),

            ]);
        }
    }
}
