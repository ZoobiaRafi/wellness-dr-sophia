<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait UserInfo {

    protected static function bootUserInfo()
    {
        static::creating(function ($model) {
            $request = Request::capture();
            $ipAddress = $request->getClientIp(true);
            $model->ip_address = $ipAddress;
            $model->browser = $request->header('User-Agent');
        });
    }
}