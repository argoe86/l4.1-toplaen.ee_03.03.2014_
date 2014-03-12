<?php

class LaonApplicationController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$rules=array(
			'eesnimi'=>'required',
			'perenimi'=>'required',
			'isikukood'=>'required',
			'elukoht'=>'required',
			'telefon'=>'required',
			'amet'=>'required',
			'laenusumma'=>'required',
			'palk'=>'required',
			'arveldusarve'=>'required',
			'email'=>'email'
			);
		

        $input=Input::all();
		$validator = Validator::make($input, $rules);
		/*if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput($input);
		}
			if(Input::hasFile('file')){
				return "fail olemas";
			}else{
				return "fail puuudub";
			}
		 		$dest_path='../storage/uploaded_files/'.$input['isikukood'];

				if(Input::hasFile('file')){
				
						foreach (\Input::file('file') as $f ) {
							$f->move($dest_path,$f->getClientOriginalName());
						}
				

				}

				//\Input::file('file')->move($dest_path, Input::file('file')->getClientOriginalName());
*/
				$newAppl= new Application();
			/*	if(Input::hasFile('file')){
					 $newAppl->file=$dest_path;
				}*/
				$newAppl->fill($input);
		$newAppl->save();

        return View::make('applications.applicationPostMessage');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('laonapplications.create');
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
        return View::make('laonapplications.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('laonapplications.edit');
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
