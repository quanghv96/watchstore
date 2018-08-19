<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded  = [];

    public function scopeGetSlide($query)
    {
    	return $query->take(config('app.slide_page'));
    }
}
