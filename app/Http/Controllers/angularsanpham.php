<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class angularsanpham extends sanphamController
{
    public function getdetail($id){
        $data = Sanpham::select('ma_dm','ma_sp','ten_sp','so_luong','don_gia','hinh_anh','mo_ta','cpu','man_hinh','he_dieu_hanh','ram','camera','pin')->where('ma_sp',$id)->get()->toArray();
        return $data;

    }

}
