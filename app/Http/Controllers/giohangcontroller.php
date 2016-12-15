<?php

namespace App\Http\Controllers;



use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Donhangs;
use App\Chitietdonhangs;
use Carbon\Carbon;

class giohangcontroller extends Controller {

    public  function  muahang($id){

        $data = DB::table('sanphams')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$data->ten_sp,'qty'=>1,'price'=>$data->don_gia,'options'=>array('img'=>$data->hinh_anh)));
        $content = Cart::content();

//        return redirect()->route("trangchu");

    }
    public  function giohang(){
        return view('shoppingcart');
    }
    public  function xoa(){
        if(\Request::ajax()){

            $id= \Request::get('id');
            Cart::remove($id);
            ECHO "OKE";

        }

//    return redirect()->route('giohang');
    }
    public  function capnhat(){
        if(\Request::ajax()){

            $id= \Request::get('id');
            $qty =\Request::get('qty');
            Cart::update($id,$qty);
            ECHO "OKE";

        }

    }
    public function pay(Request $request){
        $save = Donhangs::create(['khachhangs_id'=> $request->session()->get('demo'),
            'ngay_lap' => Carbon::now()]);
        $save->save();
        $dh = Donhangs::select()->where('khachhangs_id', $request->session()->get('demo'))->orderBy('id', 'desc')->first();
        $cart = Cart::content();
        foreach ($cart as $c){
            $ct =  Chitietdonhangs::create([
                'sanphams_id' => $c->id,
                'donhangs_id' => $dh->id,
                'so_luong' => $c->qty,
                'don_gia' => $c->price,
            ]);
            $ct->save();
        }
        Cart::destroy();
       return redirect('/Trangchu');
    }
}
