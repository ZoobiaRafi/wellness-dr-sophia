<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class LaserSession extends Model{
    use HasFactory;
    use Loggable;
    
    public function test_detail() {
        return $this->belongsTo(Test::class, 'test_id')->where('status', 1);
    }
}
