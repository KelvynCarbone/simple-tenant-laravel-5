<?php

namespace App\Entities;
use App\Traits\TenantTrait; //Utilizando a trait
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use TenantTrait; //aqui colocamos o use para implementar a trait
}
