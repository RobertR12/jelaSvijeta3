<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['title' => 'Engleski jezik', 'slug' => 'engleski',],
            ['title' => 'Njemački jezik', 'slug' => 'njemacki',],
            ['title' => 'Hrvatski jezik', 'slug' => 'hrvatski',],
            ['title' => 'Francuski jezik', 'slug' => 'francuski',],


        ];
        foreach ($items as $item) {

            \App\Language::create($item);
        }
    }
}
