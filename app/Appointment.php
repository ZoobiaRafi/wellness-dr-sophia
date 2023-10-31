<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Appointment extends Model
{

    use SoftDeletes;
    use Loggable;
    public function status_detail() {
        return $this->belongsTo(OrderStatus::class, 'status');
    }
    public function appointment_kits() {
        return $this->hasMany(AppointmentKit::class, 'order_id','order_id');
    }
    public function sessions() {
        return $this->hasMany(Appointments_Sessions::class, 'appointment_id');
        
    }
    public function order_products() {
        return $this->hasMany(OrderProduct::class, 'order_id','order_id');
    }
    public function product_detail() {
        return $this->belongsTo(Test::class, 'test_id');
    }
    public function order_detail() {
        return $this->hasMany(Order::class, 'id' , 'order_id');
    }
    public function setAppointmentDateAttribute($value){ // my mutator
        $this->attributes['appointment_date'] = date("Y-m-d",strtotime($value));
    }
    public function cart_info(){
        return $this->hasMany(CartInfo::class, 'order_id', 'order_id');
    }
    public function customer_detail() {
        return $this->belongsTo(Models\User::class, 'user_id', 'id');
    }
    public function forms_detail() {
        return $this->belongsTo(AppointmentToForm::class, 'id' , 'appointment_id');
    }
}
