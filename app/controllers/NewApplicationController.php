<?php

class NewApplicationController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	return NewApplication::whereStatus('1')->take(40)->orderBy('date', 'desc')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function updateMarkus()
	{
	 		$input= Input::all();
		$taotlus=NewApplication::find($input['id']);
		$taotlus->markus=$input['markus'];
		if($taotlus->save())
		{
			return Response::json($taotlus);
		}

//        return View::make('newapplications.create');
	}
	public function updateArh()
	{
	 	 	$input= Input::all();
		 $input['loetud'];
		$taotlus=NewApplication::find($input['id']);
		$taotlus->status=$input['status'];		
		return Response::json($taotlus->save());

//        return View::make('newapplications.create');
	}
	public function updateLoetud()
	{
	 	 	$input= Input::all();
		$taotlus=NewApplication::find($input['id']);
		$taotlus->loetud=1;	
		$taotlus->save();	
		return Response::json($taotlus);

//        return View::make('newapplications.create');
	}
	public function create()
	{
        return View::make('newapplications.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('newapplications.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('newapplications.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
