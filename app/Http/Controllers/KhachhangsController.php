<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhachhangsController extends Controller
{
    //

    public function index(){
    	return view('UI.layout');
    }

    public function store(){
    	echo "oke";
    }


    public function showLoginForm(){
    	return view('UI.trangchu.login');
    }
}
