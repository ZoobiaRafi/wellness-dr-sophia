<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class TestDetailOption extends Model
{
    use Loggable;
    public function test_detail() {
        return $this->belongsTo(TestOption::class, 'test_option_id');
    }
}
