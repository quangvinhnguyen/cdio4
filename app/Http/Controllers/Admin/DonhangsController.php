<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Donhangs;
use App\Http\Requests\CreateDonhangsRequest;
use App\Http\Requests\UpdateDonhangsRequest;
use Illuminate\Http\Request;

use App\Khachhangs;


class DonhangsController extends Controller {

	/**
	 * Display a listing of donhangs
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $donhangs = Donhangs::with("khachhangs")->get();

		return view('admin.donhangs.index', compact('donhangs'));
	}

	/**
	 * Show the form for creating a new donhangs
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $khachhangs = Khachhangs::pluck("ten_kh", "id")->prepend('Please select', null);

	    
	    return view('admin.donhangs.create', compact("khachhangs"));
	}

	/**
	 * Store a newly created donhangs in storage.
	 *
     * @param CreateDonhangsRequest|Request $request
	 */
	public function store(CreateDonhangsRequest $request)
	{
	    
		Donhangs::create($request->all());

		return redirect()->route(config('quickadmin.route').'.donhangs.index');
	}

	/**
	 * Show the form for editing the specified donhangs.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$donhangs = Donhangs::find($id);
	    $khachhangs = Khachhangs::pluck("ten_kh", "id")->prepend('Please select', null);

	    
		return view('admin.donhangs.edit', compact('donhangs', "khachhangs"));
	}

	/**
	 * Update the specified donhangs in storage.
     * @param UpdateDonhangsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateDonhangsRequest $request)
	{
		$donhangs = Donhangs::findOrFail($id);

        

		$donhangs->update($request->all());

		return redirect()->route(config('quickadmin.route').'.donhangs.index');
	}

	/**
	 * Remove the specified donhangs from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Donhangs::destroy($id);

		return redirect()->route(config('quickadmin.route').'.donhangs.index');
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
            Donhangs::destroy($toDelete);
        } else {
            Donhangs::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.donhangs.index');
    }

}
