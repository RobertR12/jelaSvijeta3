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



Route::resource('meals','MealsController');

//Route::resource('mealID','MealsController');

//////////////////////////////////////
/*Route::get('meals/{id}', [
    'as' => 'meals.MealID',
    'uses' => 'MealsController@MealID'
]);
Route::resource('meals', 'MealsController', ['except' => 'MealID']);*/

/*Route::get('meals?id={id}', function($mealID)
{
    return $mealID;
});*/

/////////////////////////
// get the category of gallery for viewing
/*Route::get('meals?id={mealID}', function($mealID) {

    // get the gallery stuff for the category
    $meal = Meal::where('category_id', '=', $mealID);

    // return a view and send the gallery data to the view
    return View::make('meals')
        ->with('meals', $meal);
});*/
/////////////////////////

Route::get('/meals/{id}', ['uses' =>'MealsController@mealsID']);

Route::get('/meal/{id}', function($id)
{
    return 'Meal id '.$id;
});


Route::resource('tags','TagsController');
Route::resource('ingredients','IngredientsController');
Route::resource('categories','CategoriesController');
Route::resource('languages','LanguagesController');
