<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Khachhang;
use App\Http\Requests\CreateKhachhangRequest;
use App\Http\Requests\UpdateKhachhangRequest;
use Illuminate\Http\Request;



class KhachhangController extends Controller {

	/**
	 * Display a listing of khachhang
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $khachhang = Khachhang::all();

		return view('admin.khachhang.index', compact('khachhang'));
	}

	/**
	 * Show the form for creating a new khachhang
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.khachhang.create');
	}

	/**
	 * Store a newly created khachhang in storage.
	 *
     * @param CreateKhachhangRequest|Request $request
	 */
	public function store(CreateKhachhangRequest $request)
	{
	    
		Khachhang::create($request->all());

		return redirect()->route(config('quickadmin.route').'.khachhang.index');
	}

	/**
	 * Show the form for editing the specified khachhang.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$khachhang = Khachhang::find($id);
	    
	    
		return view('admin.khachhang.edit', compact('khachhang'));
	}

	/**
	 * Update the specified khachhang in storage.
     * @param UpdateKhachhangRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateKhachhangRequest $request)
	{
		$khachhang = Khachhang::findOrFail($id);

        

		$khachhang->update($request->all());

		return redirect()->route(config('quickadmin.route').'.khachhang.index');
	}

	/**
	 * Remove the specified khachhang from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Khachhang::destroy($id);

		return redirect()->route(config('quickadmin.route').'.khachhang.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Khachhang::destroy($toDelete);
        } else {
            Khachhang::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.khachhang.index');
    }

}
