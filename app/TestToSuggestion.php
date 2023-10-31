<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class TestToSuggestion extends Model
{
    use Loggable;
    public function product_detail() {
        return $this->belongsTo(Test::class, 'suggested_product_id');
    }
}
