<?php

namespace Tests\Unit;

//use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

abstract class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->visit('/meals/create')
            ->type('Taylor', 'title')
            ->type('Slug', 'slug')
            ->select('35', 'category_id')
            ->select('opis jela', 'description')
            ->select('3', 'language_id')
            ->press('Create Meal')
            ->assertTrue(true);
    }
}
