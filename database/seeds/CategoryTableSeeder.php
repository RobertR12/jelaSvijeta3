<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            $items = [

                ['title' => 'Hladna predjela', 'slug' => 'hladna-predjela', 'language_id' => '2',],
                ['title' => 'Topla predjela', 'slug' => 'topla-predjela', 'language_id' => '2',],
                ['title' => 'Kruh i peciva', 'slug' => 'kruh-i-peciva', 'language_id' => '2',],
                ['title' => 'Juhe', 'slug' => 'juhe', 'language_id' => '2',],
                ['title' => 'Salate', 'slug' => 'salate', 'language_id' => '2',],

            ];

            foreach ($items as $item) {
                \App\Category::create($item);
            }
                $faker = Faker::create('App\Category');

                $limit = 20;

                for ($i = 0; $i < $limit; $i++) {
                    DB::table('categories')->insert([
                        'title' => $faker->unique()->word,
                        'slug' => $faker->unique()->slug,
                        'language_id' => $faker->numberBetween($min = 1, $max = 4),
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),

                    ]);
            }
        }
}

