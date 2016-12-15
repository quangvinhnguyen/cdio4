<?php

namespace App\Http\Controllers\UserAuth;
use Auth;
use Closure;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Khachhangs;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $redirectTo = '/Trangchu';
    protected $guard = 'khachhangs';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->redirectTo = config('quickadmin.route');
        $this->middleware('guest:khachhangs', ['except' => 'logout']);
    }


    public function PostLogin(Request $request)
    {

        $email=$request->email;
        $password=$request->password;
        if(Auth::guard('khachhangs')->attempt(['email'=>$email,'password'=>$password]))
        {
            return redirect('/Trangchu');
        }

//        echo alert("may don mat voi ta ha teo!!!");
        //return abort(403);

        return redirect('/Trangchu');
    }
}