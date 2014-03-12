<?php

class LoanApplicationController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$rules=array(
			'laenusumma'=>'required',

			);
		

       $input=Input::all();
		$validator = Validator::make($input, $rules);
		if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput($input);
		}
		
		$newAppl= new Applications();
		$newAppl->fill($input);
		$newAppl->save();
        //return View::make('iseteenindus.loans.index');
        return Redirect::to('iseteenindus/laenud');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('loanapplications.create');
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
        return View::make('loanapplications.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('loanapplications.edit');
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
