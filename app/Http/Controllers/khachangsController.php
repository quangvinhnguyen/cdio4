<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class khachangsController extends Controller
{
    public function Create(CreateKhachhangsRequest $request)
    {

        Khachhangs::create($request->all());

        return redirect()->route('Trangchu');
    }
}
