<?php

namespace Tests\Unit;

use Tests\TestCase;
//use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


abstract class mealUnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
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
    public function testLinkUnosJela()
    {
        $this->visit('/')
            ->click('Unos Jela')
            ->seePageIs('/meals/create');
    }
    public function testLinkPregledJela()
    {
        $this->visit('/')
            ->click('Pregled Jela')
            ->seePageIs('/meals');
    }
    public function testNovoJelo()
    {
        $this->visit('/meals')
            ->click('Create new Jelo')
            ->seePageIs('/meals/create');
    }
}
