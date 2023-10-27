<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Carbon\Carbon;

class Test extends Model
{
    use SoftDeletes;
    // use Loggable;

    protected $dates = ['deleted_at'];

    public $additional_attributes = ['title_with_gender'];
    
    public function getTitleWithGenderAttribute()
    {
        if($this->gender == "1") {
            if($this->status == "1") {
                return "{$this->title} - Male (Active)";
            } else {
                return "{$this->title} - Male (Inactive)";
            }
        } else {
            if($this->status == "1") {
                return "{$this->title} - Female (Active)";
            } else {
                return "{$this->title} - Female (Inactive)";
            }
        }
    }

    public function category_detail() {
        return $this->belongsTo(Category::class, 'category');
    }

    public function sessions() {
        return $this->hasMany(LaserSession::class, 'test_id');
    }

    public function hijama_packages() {
        return $this->hasMany(HijamaPackage::class, 'test_id');
    }

    public function biomarkers() {
        return $this->hasMany(TestsBiomarker::class, 'test_id');
    }

    public function biomarkers_female() {
        return $this->hasMany(TestsFemaleBiomarkerr::class, 'test_id');
    }

    public function comparisions() {
        return $this->hasOne(TestsComparision::class, 'test_id','id');
    }

    public function listing_options() {
        return $this->hasMany(TestsListingOption::class, 'test_id');
    }

    public function detail_options() {
        return $this->hasMany(TestDetailOption::class, 'test_id');
    }

    public function general_options() {
        return $this->hasMany(TestDetailGeneralOption::class, 'test_id');
    }
    
    public function order_products() {
        return $this->hasMany(OrderProduct::class, 'test_id');
    }

    public function rooms() {
        return $this->hasMany(Test_to_Rooms::class, 'test_id');
    }

    public function suggested_tests(){
        return $this->hasMany(TestToSuggestion::class, 'test_id' ,'id');
    }
    public function scopeActive($query)
    {
        return $query->where('status',1);
    }
    public function show_other_products(){
        return $this->hasMany(TestToOtherproduct::class, 'test_id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'product');
    }

    public function show_blogs(){
        return $this->belongsTo(Blog::class, 'blogs_id');
    }

    public function information_detail() {
        return $this->belongsTo(TestInformation::class, 'id' ,'test_id');
    }

    public function appointment(){
        return $this->hasMany(Appointment::class, 'test_id');
    }

   
}
