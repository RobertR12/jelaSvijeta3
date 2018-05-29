<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('meals/{id}', 'MealsController@MealID');

Route::resource('meals', 'MealsController');

/*Route::get('meals/{id}', [
    'as' => 'meals.MealID',
    'uses' => 'MealsController@MealID'
]);
Route::resource('meals', 'MealsController', ['except' => 'MealID']);*/


/*Route::get('/meal/{id}', function($mealId)
{
    return 'Meal id '.$mealId;
});*/


Route::get('meals/{id}', 'MealsController@idMeals');
Route::get('category/{categoryId}', 'MealsController@catMeals');
Route::get('meals/{id}/category/{categoryId}', 'MealsController@catIdMeals');




Route::resource('tags','TagsController');
Route::resource('ingredients','IngredientsController');
Route::resource('categories','CategoriesController');
Route::resource('languages','LanguagesController');
