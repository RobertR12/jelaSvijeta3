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
            ///CACHE
                // KREIRANJE CACHE-a putem ruta
                /*Route::get('/', function()
                {
                    Cache::put( 'cachekey', 'I am in the cache baby!', 1 );
                });*/
                //DOHVACANJE CACHE-a
                /*Route::get('/', function()
                {
                    return Cache::get( 'cachekey' );
                });*/



Route::middleware(['auth', 'admin'])->group(function() {
    Route::resource('meals', 'MealsController');
});


Route::get('meals/{id}', 'MealsController@idMeals');
Route::get('category/{categoryId}', 'MealsController@catMeals');
Route::get('meals/{id}/category/{categoryId}', 'MealsController@catIdMeals');


Route::resource('tags','TagsController');
Route::resource('ingredients','IngredientsController');
Route::resource('categories','CategoriesController');
Route::resource('languages','LanguagesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
