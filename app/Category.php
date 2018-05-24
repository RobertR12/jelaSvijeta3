<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Language()
    {
        return $this->belongsTo( 'App\Language', 'language_id ');
    }
}
