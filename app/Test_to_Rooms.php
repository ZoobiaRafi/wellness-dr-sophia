<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Test_to_Rooms extends Model
{
    protected $table="tests_to_rooms";
    use SoftDeletes,Loggable;

    public function test_detail() {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function room_detail(){

        return $this->belongsTo(Room::class, 'room_id');

    }
        public function room(){

            return $this->hasOne('App\Room','id', 'room_id');
    
            
        }
        public function test(){

            return $this->hasOne('App\Test','id', 'test_id');
    
        }
 
}
