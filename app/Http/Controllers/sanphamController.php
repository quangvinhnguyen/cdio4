<?php

namespace App\Http\Controllers;

use App\Hinhanh;
use App\Hinhanhs;
use App\Sanpham;
use App\Sanphams;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Arr;

class sanphamController extends Controller
{
    public function showdetail($id){

        $data = Sanphams::select('danhmucs_id','id','ten_sp','so_luong','don_gia','hinh_anh','mo_ta','cpu','man_hinh','he_dieu_hanh','ram','camera','pin')->where('id',$id)->get();

        return $data;
    }
    public function show(){

        $data= Sanphams::paginate(8);

        return Response::json($data);
    }
    public  function hinh($id){
        $data= Hinhanhs::select('ten_ha','sanphams_id')->where('sanphams_id',$id)->get();
        return $data;

    }
}
