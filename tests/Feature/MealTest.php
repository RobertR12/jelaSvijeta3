<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MealTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $this->assertTrue(true);
    }

    public function testFormCreateMeal()
    {

        /*$this->visit('/meals/create')
            ->type('Mahune', 'title')
            ->type('Mahune2wew', 'slug')
            ->select('34', 'category_id')
            ->type('descripdsftion', 'description')
            ->select('3', 'language_id')
            ->press('Create Meal');*/


    }




}
