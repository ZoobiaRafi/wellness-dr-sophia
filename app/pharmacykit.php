<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class pharmacykit extends Model
{
    use Loggable;
    protected $table = 'pharmacy_kits';

    public function scopeInStockByKit($query,$testid)
    {
        return $query->where('customer_order_id', null)->where("test_id",$testid);
    }
    public function scopeTotalSalesByKit($query,$testid){
        return $query->where('customer_order_id','!=',null)->where("test_id",$testid);
    }
    public function test_detail() {
        return $this->belongsTo(Test::class, 'test_id');
    }

}