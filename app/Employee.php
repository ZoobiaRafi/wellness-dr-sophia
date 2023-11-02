<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Employee extends Model
{
    use SoftDeletes,Loggable;
    protected $dates = ['deleted_at'];

    public function department_detail() {
        return $this->belongsTo(Department::class, 'department');
    }

    public function location_detail() {
        return $this->belongsTo(Location::class, 'location');
    }
}
