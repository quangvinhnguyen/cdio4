<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Donhangs extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'donhangs';
    
    protected $fillable = [
          'khachhangs_id',
          'ngay_lap'
    ];
    

    public static function boot()
    {
        parent::boot();

        Donhangs::observe(new UserActionsObserver);
    }
    
    public function khachhangs()
    {
        return $this->hasOne('App\Khachhangs', 'id', 'khachhangs_id');
    }


    
    
    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setNgayLapAttribute($input)
    {
        if($input != '') {
            $this->attributes['ngay_lap'] = Carbon::createFromFormat(config('quickadmin.date_format') . ' ' . config('quickadmin.time_format'), $input)->format('Y-m-d H:i:s');
        }else{
            $this->attributes['ngay_lap'] = '';
        }
    }

    /**
     * Get attribute from datetime format
     * @param $input
     *
     * @return string
     */
    public function getNgayLapAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('quickadmin.date_format') . ' ' .config('quickadmin.time_format'));
        }else{
            return '';
        }
    }


}