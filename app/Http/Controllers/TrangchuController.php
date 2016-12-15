<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;

use App\Http\Requests;

class TrangchuController extends Controller
{
    public  function  index(){
        return view('UI.trangchu.index');
    }
    public function __construct()
    {
        $this->middleware('member');

    }
    public function show($id){

        return $id;
    }

    public function showFormLogin(){
        return view('UI.login');
    }
    public function getLienHe () {
        return view('UI.lienhe');
    }

    public function postLienHe (Request $request) {
        $data = array(
            'email' => $request->useremail,
            'hoten' => $request->name,
            'tieude' => $request->subject,
            'tinnhan' => $request->message
        );
        Mail::send('emails.blanks', $data, function($msg) use ($data) {
            $msg->from($data['email']);
            $msg->to('lebaouyen1@gmail.com');
            $msg->subject($data['tieude']);

        });
        Session::flash('suscess','Email của bạn đã được gửi');
        return view('UI.trangchu.index');
    }

}
