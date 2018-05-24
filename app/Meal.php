<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use SoftDeletes;

    public function Ingredient() {

        return $this ->belongsToMany('App\Ingredient', 'meal_ing');
    }

    public function Tag() {

        return $this ->belongsToMany('App\Tag', 'meal_tag');
    }
    public function Language() {

        return $this ->belongsToMany('App\Language', 'languages');
    }
    public function Category() {

        return $this ->belongsTo('App\Category', 'category_id');
    }
}
