<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Scopes\AuthorizedScope;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laraveldaily\Quickadmin\Traits\AdminPermissionsTrait;
use Illuminate\Foundation\Auth\Access\Authorizable;
class Khachhangs extends Model implements  AuthenticatableContract, AuthorizableContract, CanResetPasswordContract{

    use SoftDeletes;
    use Authenticatable, Authorizable, CanResetPassword, AdminPermissionsTrait;
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'khachhangs';
    
    protected $fillable = [
          'ten_kh',
          'email',
          'password',
          'sdt',
          'dia_chi'
    ];
    
    protected $hidden =['password'];
    public static function boot()
    {
        parent::boot();

        Khachhangs::observe(new UserActionsObserver);
    }
    
    
    
    
}