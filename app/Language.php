<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function Meals()
    {
        return $this->belongsTo( 'App\Meal', 'language_id ');
    }
}
