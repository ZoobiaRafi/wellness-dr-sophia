<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class TestDetailGeneralOption extends Model
{
    use Loggable;
    public function general_detail() {
        return $this->belongsTo(GeneralOption::class, 'general_option_id');
    }
}
