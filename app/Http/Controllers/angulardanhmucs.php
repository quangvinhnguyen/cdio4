<?php

namespace App\Http\Controllers;

use App\danhmucs;
use Illuminate\Http\Request;

use App\Http\Requests;

class angulardanhmucs extends danhmucsController
{
    public function index(){
        $data = danhmucs:: select('ma_dm','ten_dm')->get()->toArray();
//        return view('admin.cate.add',compact('data'));


        return $data;


    }

}
