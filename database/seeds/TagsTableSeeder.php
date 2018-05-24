<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['title' => 'hrv1', 'slug' => 'hrvTag1', 'language_id' => '3',],
            ['title' => 'hrv2', 'slug' => 'hrvTag2', 'language_id' => '3',],
            ['title' => 'hrv3', 'slug' => 'hrvTag3', 'language_id' => '3',],
            ['title' => 'hrv4', 'slug' => 'hrvTag4', 'language_id' => '3',],
            ['title' => 'hrv5', 'slug' => 'hrvTag5', 'language_id' => '3',],

        ];

        foreach ($items as $item) {
            \App\Tag::create($item);
        }

        $faker = Faker\Factory::create();


        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tags')->insert([ //,
                'title' => $faker->unique()->word,
                'slug' => $faker->unique()->slug,
                'language_id' => $faker->numberBetween($min = 1, $max = 4),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
