<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class HijamaPackage extends Model
{
    use Loggable;
    public function packages_addons(){
        return $this->hasMany(PackagesAddon::class,'package_id');
    }
}
