<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Khachhangs;
use App\Http\Requests\CreateKhachhangsRequest;
use App\Http\Requests\UpdateKhachhangsRequest;
use Illuminate\Http\Request;



class KhachhangsController extends Controller {

	/**
	 * Display a listing of khachhangs
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $khachhangs = Khachhangs::all();

		return view('admin.khachhangs.index', compact('khachhangs'));
	}

	/**
	 * Show the form for creating a new khachhangs
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.khachhangs.create');
	}

	/**
	 * Store a newly created khachhangs in storage.
	 *
     * @param CreateKhachhangsRequest|Request $request
	 */
	public function store(CreateKhachhangsRequest $request)
	{
	    
		Khachhangs::create($request->all());

		return redirect()->route(config('quickadmin.route').'.khachhangs.index');
	}

	/**
	 * Show the form for editing the specified khachhangs.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$khachhangs = Khachhangs::find($id);
	    
	    
		return view('admin.khachhangs.edit', compact('khachhangs'));
	}

	/**
	 * Update the specified khachhangs in storage.
     * @param UpdateKhachhangsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateKhachhangsRequest $request)
	{
		$khachhangs = Khachhangs::findOrFail($id);

        

		$khachhangs->update($request->all());

		return redirect()->route(config('quickadmin.route').'.khachhangs.index');
	}

	/**
	 * Remove the specified khachhangs from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Khachhangs::destroy($id);

		return redirect()->route(config('quickadmin.route').'.khachhangs.index');
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
            Khachhangs::destroy($toDelete);
        } else {
            Khachhangs::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.khachhangs.index');
    }

}
