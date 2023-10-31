<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Blog extends Model
{
    use SoftDeletes,Loggable;
    protected $dates = ['deleted_at'];

    public function author_info()
    {
        return $this->belongsTo(User::class, 'author');
    }
    
    public function category_detail(){
        return $this->belongsTo(BlogCategory::class, 'category');
    }
}
