<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use Loggable;
    use SoftDeletes;
    public function product_detail()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
    public function person_info()
    {
        return $this->hasOne(CartInfo::class, 'order_product_id');
    }

    public function user_detail()
    {
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'pharmacy_id');
    }
    public function package_detail()
    {
        return $this->belongsTo(HijamaPackage::class, 'package');
    }

    public function order_detail()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
