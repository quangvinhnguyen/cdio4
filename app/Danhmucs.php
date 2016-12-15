<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Danhmucs extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'danhmucs';
    
    protected $fillable = [
          'ten_dm',
          'ma_cdm'
    ];
    

    public static function boot()
    {
        parent::boot();

        Danhmucs::observe(new UserActionsObserver);
    }
    
    
    
    
}