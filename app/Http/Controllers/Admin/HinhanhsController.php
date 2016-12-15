<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Hinhanhs;
use App\Http\Requests\CreateHinhanhsRequest;
use App\Http\Requests\UpdateHinhanhsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Sanphams;


class HinhanhsController extends Controller {

	/**
	 * Display a listing of hinhanhs
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $hinhanhs = Hinhanhs::with("sanphams")->get();

		return view('admin.hinhanhs.index', compact('hinhanhs'));
	}

	/**
	 * Show the form for creating a new hinhanhs
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $sanphams = Sanphams::pluck("ten_sp", "id")->prepend('Please select', null);

	    
	    return view('admin.hinhanhs.create', compact("sanphams"));
	}

	/**
	 * Store a newly created hinhanhs in storage.
	 *
     * @param CreateHinhanhsRequest|Request $request
	 */
	public function store(CreateHinhanhsRequest $request)
	{
	    $request = $this->saveFiles($request);
		Hinhanhs::create($request->all());

		return redirect()->route(config('quickadmin.route').'.hinhanhs.index');
	}

	/**
	 * Show the form for editing the specified hinhanhs.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$hinhanhs = Hinhanhs::find($id);
	    $sanphams = Sanphams::pluck("ten_sp", "id")->prepend('Please select', null);

	    
		return view('admin.hinhanhs.edit', compact('hinhanhs', "sanphams"));
	}

	/**
	 * Update the specified hinhanhs in storage.
     * @param UpdateHinhanhsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHinhanhsRequest $request)
	{
		$hinhanhs = Hinhanhs::findOrFail($id);

        $request = $this->saveFiles($request);

		$hinhanhs->update($request->all());

		return redirect()->route(config('quickadmin.route').'.hinhanhs.index');
	}

	/**
	 * Remove the specified hinhanhs from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Hinhanhs::destroy($id);

		return redirect()->route(config('quickadmin.route').'.hinhanhs.index');
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
            Hinhanhs::destroy($toDelete);
        } else {
            Hinhanhs::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.hinhanhs.index');
    }

}
