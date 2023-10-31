<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class CartInfo extends Model
{
    use Loggable;
    public function order_products() {
        return $this->hasMany(OrderProduct::class, 'id','order_product_id');
    }
    public function customer_kits() {
        return $this->hasMany(CustomerKit::class, 'order_id','order_id');
    }
    public function appointment_kits() {
        return $this->hasMany(AppointmentKit::class, 'order_id','order_id');
    }
}
