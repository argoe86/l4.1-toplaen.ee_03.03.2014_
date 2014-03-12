<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 	$users = Client::take(10)->orderBy('kl_nr', 'DESC')->get();
	  	$userscount=Client::all()->count();
        return View::make('iseteenindus.users.index', compact('users', 'userscount'));
	}
    public function findAndFill(){
         $input=Input::all();
 		 	 $klient_nr=(Client::where('kl_nr','!=','')->where('kl_nr','<','10000')->orderBy('kl_nr','DESC')->first()->kl_nr)+1;

         $appID=Applications::find($input['id']);
        $uusklient= new Client();

        $uusklient->kl_nr=$klient_nr;
//        $uusklient->fill($input);
  		$uusklient->eesnimi=$input['eesnimi'];
  		$uusklient->perenimi=$input['perenimi'];
  		$uusklient->isikukood=$input['isikukood'];
  		$uusklient->elukoht=$input['elukoht'];
  		$uusklient->telefon=$input['telefon'];
  		$uusklient->amet=$input['amet'];
  		$uusklient->palk=$input['palk'];
  		$uusklient->arveldusarve=$input['arveldusarve'];
  		$uusklient->email=$input['email'];
       if($uusklient->save()){
       	 return Response::json($uusklient);
       }else{
       	return Response::json($uusklient);
       }
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
        return View::make('iseteenindus.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input=Input::all();
		$user= new Client();
		$user->username=$input['username'];
		$user->password=Hash::make($input['password']);
		$user->save();
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
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
