<?php

namespace App\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Support\Str;

//Veja que o model extende o BaseModel 
//que é o nosso model base que chama nossa trait, assim não 
//precisamos instanciar a trait em todos os models que criarmos

class User extends BaseModel implements  AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'born_at',
        'document',
        'document_type',
        'slug',
        'status',
        'gender',
        'group',
        'tenant_id',
    ];
}
