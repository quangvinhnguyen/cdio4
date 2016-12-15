<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Chitietdonhangs;
use App\Http\Requests\CreateChitietdonhangsRequest;
use App\Http\Requests\UpdateChitietdonhangsRequest;
use Illuminate\Http\Request;

use App\Sanphams;
use App\Donhangs;


class ChitietdonhangsController extends Controller {

	/**
	 * Display a listing of chitietdonhangs
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $chitietdonhangs = Chitietdonhangs::with("sanphams")->with("donhangs")->get();

		return view('admin.chitietdonhangs.index', compact('chitietdonhangs'));
	}

	/**
	 * Show the form for creating a new chitietdonhangs
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $sanphams = Sanphams::pluck("ten_sp", "id")->prepend('Please select', null);
$donhangs = Donhangs::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.chitietdonhangs.create', compact("sanphams", "donhangs"));
	}

	/**
	 * Store a newly created chitietdonhangs in storage.
	 *
     * @param CreateChitietdonhangsRequest|Request $request
	 */
	public function store(CreateChitietdonhangsRequest $request)
	{
	    
		Chitietdonhangs::create($request->all());

		return redirect()->route(config('quickadmin.route').'.chitietdonhangs.index');
	}

	/**
	 * Show the form for editing the specified chitietdonhangs.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$chitietdonhangs = Chitietdonhangs::find($id);
	    $sanphams = Sanphams::pluck("ten_sp", "id")->prepend('Please select', null);
$donhangs = Donhangs::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.chitietdonhangs.edit', compact('chitietdonhangs', "sanphams", "donhangs"));
	}

	/**
	 * Update the specified chitietdonhangs in storage.
     * @param UpdateChitietdonhangsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateChitietdonhangsRequest $request)
	{
		$chitietdonhangs = Chitietdonhangs::findOrFail($id);

        

		$chitietdonhangs->update($request->all());

		return redirect()->route(config('quickadmin.route').'.chitietdonhangs.index');
	}

	/**
	 * Remove the specified chitietdonhangs from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Chitietdonhangs::destroy($id);

		return redirect()->route(config('quickadmin.route').'.chitietdonhangs.index');
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
            Chitietdonhangs::destroy($toDelete);
        } else {
            Chitietdonhangs::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.chitietdonhangs.index');
    }

}
