<?php
namespace App\Traits;

use App\Observers\TenantObserver;

trait TenantTrait
{
    public static function bootTenantTrait()
    {
        static::observe(TenantObserver::class);
    }
}
