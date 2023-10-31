<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class BlogCategory extends Model
{
    use SoftDeletes,Loggable;
    protected $dates = ['deleted_at'];

    public function blogs() {
        return $this->hasMany(Blog::class, 'category');
    }
}
