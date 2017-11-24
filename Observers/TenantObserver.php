<?php

namespace App\Observers;

use App\Entities\BaseModel;
use Illuminate\Support\Facades\Session;

class TenantObserver
{
    public function creating(BaseModel $model)
    {
        if(isset($model->tenant_id))
            $model->tenant_id = Session::get('tenant_id');
    }
    public function deleting(BaseModel $model)
    {
        //
    }
}
