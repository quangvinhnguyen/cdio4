<?php

namespace App\Http\Controllers;

use App\Sanpham;
use App\Sanphams;
use Illuminate\Http\Request;
use Response;
use App\Http\Requests;

class listingproduct extends Controller
{
    public function showdetail($id){
        $data= Sanphams::where('danhmucs_id',$id)->paginate(8);
        return Response::json($data);
    }
}
