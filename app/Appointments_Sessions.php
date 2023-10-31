<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Appointments_Sessions extends Model
{   
    use Loggable;
    protected $table = 'appointments_sessions';


}
