<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Carbon\Carbon;

class Test extends Model
{
    use SoftDeletes,Loggable;
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

    // public function fetch_orders_by_date_filter($month, $year, $heard)
    // {   
    //     if($heard != 0){
    //         $query = OrderProduct::where(function ($query) use ($heard) {
    //             $query->where(function ($w) use ($heard){
    //                 $w->whereHas('order_detail', function ($x) use ($heard) {
    //                     $x->where('appointment', 1)->where('heard_from',$heard)->where('takepayment_status', 'Paid');
    //                 });
    //             })->orWhere(function ($v) use ($heard){
    //                 $v->whereHas('order_detail',function($a) use ($heard){
    //                     $a->where('appointment', 0)->where('heard_from',$heard);    
    //                 })->whereHas('product_detail.appointment', function ($y) {
    //                     $y->where('appointment_status_id', 4);
    //                 });
    //             });
    //         })->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('test_id', $this->id);
    //     }
    //     else if($heard == 0){
    //         $query = OrderProduct::where(function ($query) {
    //             $query->where(function ($w){
    //                 $w->whereHas('order_detail', function ($x) {
    //                     $x->where('appointment', 1)->where('takepayment_status', 'Paid');
    //                 });
    //             })->orWhere(function ($v){
    //                 $v->whereHas('order_detail',function($a){
    //                     $a->where('appointment', 0)->where('takepayment_status', 'Paid');
    //                 });    
    //                 })->whereHas('product_detail.appointment', function ($y) {
    //                     $y->where('appointment_status_id', 4);
    //                 });
    //             });
    //         })->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('test_id', $this->id);
    //     }
    //     return $query;
    // }

    public function fetch_orders_by_date_filter($month, $year, $heard)
    {
        if($heard == 100){
            $query = OrderProduct::where(function ($query) {
                $query->where(function ($w) {
                    $w->whereHas('order_detail', function ($x) {
                        $x->where('appointment', 1)->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment', function ($y) {
                        $y->where('appointment_status_id', 4)->whereNull('user_id');
                    });
                })->orWhere(function ($v) {
                    $v->whereHas('order_detail', function ($a) {
                        $a->where('appointment', 0)->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment',function($a){
                        $a->whereNull('user_id');
                    });
                });
            })->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('test_id', $this->id);
        }
        else if ($heard != 0) {
            $query = OrderProduct::where(function ($query) use ($heard) {
                $query->where(function ($w) use ($heard) {
                    $w->whereHas('order_detail', function ($x) use ($heard) {
                        $x->where('appointment', 1)->whereIn('heard_from', $heard)->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment', function ($y) {
                        $y->where('appointment_status_id', 4);
                    });
                })->orWhere(function ($v) use ($heard) {
                    $v->whereHas('order_detail', function ($a) use ($heard) {
                        $a->where('appointment', 0)->whereIn('heard_from', $heard);
                    });
                });
            })->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('test_id', $this->id);
        } 
        else if ($heard == 0) {
            $query = OrderProduct::where(function ($query) {
                $query->where(function ($w) {
                    $w->whereHas('order_detail', function ($x) {
                        $x->where('appointment', 1)->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment', function ($y) {
                        $y->where('appointment_status_id', 4);
                    });
                })->orWhere(function ($v) {
                    $v->whereHas('order_detail', function ($a) {
                        $a->where('appointment', 0)->where('takepayment_status', 'Paid');
                    });
                });
            })->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('test_id', $this->id);
        }
        
        return $query;
    }

    public function fetch_orders_by_date_range($startdate, $enddate, $heard)
    {
        if($heard == 100){
            $query = OrderProduct::where(function ($query) {
                $query->where(function ($w) {
                    $w->whereHas('order_detail', function ($x) {
                        $x->where('appointment', 1)->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment', function ($y) {
                        $y->where('appointment_status_id', 4)->whereNull('user_id');
                    });
                })->orWhere(function ($v) {
                    $v->whereHas('order_detail', function ($a) {
                        $a->where('appointment', 0)->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment', function($a){
                        $a->whereNull('user_id');
                    });
                });
            })->whereBetween('created_at',[$startdate,$enddate])->where('test_id', $this->id);
        }
        else if($heard == 101){
            $query = OrderProduct::where(function ($query) {
                $query->where(function ($w) {
                    $w->whereHas('order_detail', function ($x) {
                        $x->where('appointment', 1)->whereIn('heard_from', ['Advertisement','Google Ads','Facebook','Instagram','Tik Tok','Emails','Online','Website'])->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment', function ($y) {
                        $y->where('appointment_status_id', 4)->whereNull('user_id');
                    });
                })->orWhere(function ($v) {
                    $v->whereHas('order_detail', function ($a) {
                        $a->where('appointment', 0)->whereIn('heard_from', ['Advertisement','Google Ads','Facebook','Instagram','Tik Tok','Emails','Online','Website']);
                    })->whereHas('product_detail.appointment',function($a){
                        $a->whereNull('user_id');
                    });
                });
            })->whereBetween('created_at',[$startdate,$enddate])->where('test_id', $this->id);
        }
        else if ($heard != 0) {
            $query = OrderProduct::where(function ($query) use ($heard) {
                $query->where(function ($w) use ($heard) {
                    $w->whereHas('order_detail', function ($x) use ($heard) {
                        $x->where('appointment', 1)->whereIn('heard_from', $heard)->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment', function ($y) {
                        $y->where('appointment_status_id', 4);
                    });
                })->orWhere(function ($v) use ($heard) {
                    $v->whereHas('order_detail', function ($a) use ($heard) {
                        $a->where('appointment', 0)->whereIn('heard_from', $heard);
                    });
                });
            })->whereBetween('created_at',[$startdate,$enddate])->where('test_id', $this->id);
        } 
        else if ($heard == 0) {
            $query = OrderProduct::where(function ($query) {
                $query->where(function ($w) {
                    $w->whereHas('order_detail', function ($x) {
                        $x->where('appointment', 1)->where('takepayment_status', 'Paid');
                    })->whereHas('product_detail.appointment', function ($y) {
                        $y->where('appointment_status_id', 4);
                    });
                })->orWhere(function ($v) {
                    $v->whereHas('order_detail', function ($a) {
                        $a->where('appointment', 0)->where('takepayment_status', 'Paid');
                    });
                });
            })->whereBetween('created_at',[$startdate,$enddate])->where('test_id', $this->id);
        }
        return $query;
    }

}
