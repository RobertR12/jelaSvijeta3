<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function Language()
    {
        return $this->belongsTo( 'App\Language', 'language_id ');
    }
}
