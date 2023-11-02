<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class LaserLocation extends Model{
    use HasFactory,Loggable;

    public function services() {
        return $this->hasMany(Test::class, 'laser_location')->where('status', 1);
    }
    public function all_services() {
        return $this->hasMany(Test::class, 'laser_location');
    }
}
