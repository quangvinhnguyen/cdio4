<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Hinhanhs extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'hinhanhs';
    
    protected $fillable = [
          'ten_ha',
          'sanphams_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        Hinhanhs::observe(new UserActionsObserver);
    }
    
    public function sanphams()
    {
        return $this->hasOne('App\Sanphams', 'id', 'sanphams_id');
    }


    
    
    
}