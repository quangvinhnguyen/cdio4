<?php

namespace App\Http\Middleware;

use App\Khachhangs;
use Closure;
use App\User;
use App\Role;
class RedirectIfNotUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::user()!=null){
            $id = \Auth::user()->id;
            $member = User::find($id);
           if($member){
              return redirect('/admin');
           }
        }
//         if(!\Auth::guard($guard)->check()){
//            $id = \Auth::guard($guard)->id();
////            $member = Khachhangs::find($id);
////            if($member)
//                return dd($id);
//        }
//        else{
////            $idkh =\Auth::guard()->id;
////            $kh = Khachhangs::find($idkh);
////            if($kh){
////                return redirect('/Trangchu');
////            }
//            return redirect('/Trangchu');
//        }
        return $next($request);
    }
}
