<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Review extends Model
{
    use Loggable;
    public function product_detail() {
        return $this->hasMany(Test::class, 'id' , "product");
    }
}
