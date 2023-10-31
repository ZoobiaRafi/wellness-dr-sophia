<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UserInfo;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class Order extends Model
{
    use UserInfo;
    use Loggable;
    public function order_products() {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function customer_detail() {
        return $this->belongsTo(Models\User::class, 'customer_id', 'id');
    }
    
    public function status_detail() {
        return $this->belongsTo(OrderStatus::class, 'status');
    }

    public function scopeOrders($query)
    {
        return $query->where('appointment', 0);
    }

    public function user_detail() {
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'customer_id');
    }

    public function pharmacy_kits() {
        return $this->hasMany(pharmacykit::class, 'order_id');
    }

    public function customer_kits() {
        return $this->hasMany(CustomerKit::class, 'order_id');
    }

    public function cart_info(){
        return $this->hasMany(CartInfo::class, 'order_id');
    }

    public function coupon_detail(){
        return $this->hasOne(CouponCode::class, 'code' , 'coupon_code');
    }

    public function appointment_detail(){
        return $this->hasMany(Appointment::class, 'order_id');
    }

    

}
