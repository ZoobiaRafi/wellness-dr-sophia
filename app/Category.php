<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Category extends Model
{
    use SoftDeletes;
    // use Loggable;

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany(Test::class, 'category')->where('status', 1)->whereNull('deleted_at')->where('pharmacy_status', 0)->where('website_visible', 1)->orderBy('sort_order');
    }
    public function tests()
    {
        return $this->hasMany(Test::class, 'category')->where('status', 1);
    }
    public function laser_products()
    {
        return $this->hasMany(Test::class, 'category')->where('status', 1)->whereNull('deleted_at')->where('pharmacy_status', 0)->where('website_visible', 1)->orderBy('laser_location');
    }

    public function featured_tests()
    {
        return $this->hasMany(Test::class, 'category')->where('status', 1)->whereNull('deleted_at')->where('featured', 1)->where('pharmacy_status', 0)->where('website_visible', 1);
    }

    public function all_tests()
    {
        return $this->hasMany(Test::class, 'category')->where('status', 1)->whereNull('deleted_at')->where('pharmacy_status', 0)->where('website_visible', 1)->orderBy('best_seller', 'DESC')->orderBy('listing_order');
    }

    public function menu_tests()
    {
        return $this->hasMany(Test::class, 'category')->where('status', 1)->whereNull('deleted_at')->where('pharmacy_status', 0)->where('website_visible', 1)->orderBy('menu_title');
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category');
    }

    public function parent_category_detail(){
        return $this->belongsTo(Category::class, 'parent_category');
    }

    public function all_products(){
        return $this->hasMany(Test::class, 'category')->whereNull('deleted_at')->where('pharmacy_status', 0)->orderBy('sort_order');
    }
}
