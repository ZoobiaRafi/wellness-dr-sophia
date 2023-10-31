<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class CustomerKit extends Model
{
    use Loggable;
    public function product_detail() {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
