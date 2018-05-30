<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Meals()
    {
        return $this->belongsTo( 'App\Meal', 'category_id ');
    }
}
