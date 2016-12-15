<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Chitietdonhangs extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'chitietdonhangs';
    
    protected $fillable = [
          'sanphams_id',
          'donhangs_id',
          'so_luong',
          'don_gia'
    ];
    

    public static function boot()
    {
        parent::boot();

        Chitietdonhangs::observe(new UserActionsObserver);
    }
    
    public function sanphams()
    {
        return $this->hasOne('App\Sanphams', 'id', 'sanphams_id');
    }


    public function donhangs()
    {
        return $this->hasOne('App\Donhangs', 'id', 'donhangs_id');
    }


    
    
    
}