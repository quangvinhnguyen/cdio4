<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Sanphams extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'sanphams';
    
    protected $fillable = [
          'ten_sp',
          'danhmucs_id',
          'so_luong',
          'don_gia',
          'hinh_anh',
          'mo_ta',
          'cpu',
          'man_hinh',
          'he_dieu_hanh',
          'ram',
          'camera',
          'pin'
    ];
    protected $hidden = array();
    

    public static function boot()
    {
        parent::boot();

        Sanphams::observe(new UserActionsObserver);
    }
    
    public function danhmucs()
    {
        return $this->hasOne('App\Danhmucs', 'id', 'danhmucs_id');
    }


    
    
    
}