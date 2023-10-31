<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class CouponCode extends Model
{
    use Loggable;
    public function coupon_code_categories() {
        return $this->hasMany(CouponToCategory::class, 'coupon_code_id');
    }

    public function coupon_code_products() {
        return $this->hasMany(CouponToProduct::class, 'coupon_code_id');
    }

    public function coupon_code_courses() {
        return $this->hasMany(CouponToCourse::class, 'coupon_code_id');
    }
}
