<?php

use Illuminate\Database\Seeder;

class MealTagTableSeeder extends Seeder
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
            DB::table('meal_tag')->insert([ //,
                'meal_id' => $faker->numberBetween($min = 62, $max = 72),
                'tag_id' => $faker->numberBetween($min = 81, $max = 96),

            ]);
        }
    }
}
