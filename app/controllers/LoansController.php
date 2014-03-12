<?php

class LoansController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('loans.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('loans.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	

	//return  Loan::create(Input::all())->with('client')->first();
		 $input=Input::all();
		
		$loan= new Loanadd();
	/*	$loan->kl_nr=$input['kl_nr'];
		$loan->laen=$input['laen'];
		$loan->tasutud_laen=$input['tasutud_laen'];
		$loan->intress=$input['intress'];
		$loan->pank=$input['pank'];
*/		
		if($input['laen']==false){
		$loan->multirow_id=$input['id'];
			}
		
		$loan->fill($input);
	
		 if($loan->save()){
			if($input['laen']){
			  Loan::where('ID', '=', $loan->ID)->update(array('multirow_id' => $loan->ID));
			}
		
		 }


		 	return Response::json($loan);
		 

		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('loans.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('loans.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input= Input::all();
		  $loans= Laon::find($input['ID']);
		$loans->active_loan=$input['active_loan'];
		$loans->save();
		return Response::json($loans);
	}
	public function destroy($id){
		return Loan::whereId($id)->delete();

		
	}
}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * 