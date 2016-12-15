<?php

namespace App\Http\Controllers;

use App\Hinhanh;
use App\Hinhanhs;
use App\Sanpham;
use App\Sanphams;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Arr;

class timkiem extends Controller
{
    public function getSearch(Request $request){
        $name = $request->input('search');
        if($name == '') {
            return redirect()->back();
        } else {
            $sanpham_search = DB::table('sanphams')->where('ten_sp', 'like', '%'.$name.'%')->get();
            $sp_count = DB::table('sanphams')->where('ten_sp', 'like', '%'.$name.'%')->count();
            return view('UI.sanpham.timkiem',compact('sanpham_search','sp_count'));
        }
    }

    public function show($name){
        $sanpham_search = sanphams::select()->where('ten_sp', 'like', '%'.$name.'%')->paginate(8);
        return Response::json($sanpham_search);
    }
}
