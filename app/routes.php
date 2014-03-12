<?php
use Carbon\Carbon;
Event::listen('illuminate.query', function($sql){

	//var_dump($sql);
});
//Start baas routes

Route::get('uusbaas', 'BackendController@index')->before('auth.baas');
//Route::get('baas', function(){
//	return "etst";
//});
Route::delete('uusbaas/removeLoan/{id}', 'LoansController@destroy');
Route::get('uusbaas/login', 'BackendController@create');
Route::post('uusbaas/login', array('as'=>'bcsession.store','uses'=>'BackendController@store'));
Route::post('uusbaas/add/loan', array('as'=>'add.loan', 'uses'=>'LoansController@store'));
Route::post('uusbaas/update/loan', 'LoansController@update');
Route::get('uusbaas/taotlused', 'NewApplicationController@index');
Route::post('uusbaas/addToClientList', 'UsersController@findAndFill');
Route::post('uusbaas/taotlused/markus/update', 'NewApplicationController@updateMarkus');
Route::post('uusbaas/taotlused/arh/update', 'NewApplicationController@updateArh');
Route::post('uusbaas/taotlused/loetud/update', 'NewApplicationController@updateLoetud');
Route::get('uusbaas/kuuraport', 'WkPDFGeneratorController@monthRaport');

//Paevaraha baas send email
Route::post('uusbaas/sendmail', 'MailSendController@index');
Route::get('uusbaas/mail/template', function(){
	return View::make('emails.templates.maksehaire.index')->render();
});
//Paevaraha baas pdf generate
Route::post('uusbaas/wkpdf', 'WkPDFGeneratorController@index');
Route::get('uusbaas/wkpdf/{isikukood}', 'WkPDFGeneratorController@index');

//****
Route::get('uusbaas/raamatupidamine', function(){
 //$raamat=Client::with('loan')->get();
 $raamat=Loan::with('client')->get();
//	return $raamat= Loan::with('client')->all();
	return View::make('raamatupidamine.index', compact('raamat'));

			 //$client=Client::with('loan')->whereKl_nr($id)->first();

});
// Update userdata from from

Route::post('uusbaas/update/userdata',function(){
     $input=Input::all();
return Response::json(Client::find($input['kl_nr'])->update($input));
});
//End baas routes
Route::get('laenu-pikendamine', function(){
	return View::make('pikendamine.index');
});

Route::get('hinnakiri', function(){
   return View::make('hinnakiri.index');
});
Route::get('firmast', function(){
   return View::make('firmast.index');

});
Route::get('kontakt', function(){
   return View::make('kontakt.index');

});
Route::get('digiallkiri', 'DigiAuthController@index');
Route::post('password/remind-queue', function(){
//	$data=[];
//return Input::only('email');

//	$mail=['email'=>'argoe.erit@gmail.com'];
	Queue::push('QueueController', array('email'=>Input::only('email')));
	//Mail::queue('queue.index', $data, function($message){
	//	$message->to('argoe.erit@gmail.com')->subject('Queue testimine');
	//});
	
	return Redirect::back();
});
Route::controller('password', 'RemindersController');
Route::get('qu', function(){
//	Queue::push('RemindersController@postRemind', )
});
Route::get('parooli-uuendamine', function(){
	return View::make('password.remind');
});


Route::get('iseteenindus', array('as'=>'iseteenindus','uses'=>'SelfServiceController@index'))->before('auth');
Route::get('iseteenindus/login','SessionController@create');
Route::post('iseteenindus/login', array('as'=>'session.store','uses'=>'SessionController@store'))->before('csrf');
Route::get('logout', 'SessionController@destroy')->before('csrf');
Route::get('laen-finantsvoimekusele', function(){
	return View::make('laen-finantsvoimekusele.index');
});




Route::group(array('before'=>'auth'), function(){

	Route::group(array('prefix'=>'iseteenindus'), function(){
		Route::get('lepingud', array('as'=>'lepingud', 'uses'=>function(){return View::make('iseteenindus.lepingud.index');}));
		Route::get('laenud', array('as'=>'laenud', 'uses'=>'IseteenindusLoanController@index'));
		Route::get('laenud/json', array('as'=>'laenud-json', 'uses'=>'IseteenindusLoanController@index_json'));

		Route::get('profiil', array('as'=>'profiil','uses'=>function(){return View::make('iseteenindus.authUser.index');}));
		Route::get('create-user', 'UsersController@create');
		Route::post('create-user',array('as'=>'users.store', 'uses'=> 'UsersController@store'));
		Route::post('laenud','LoanApplicationController@index');

		//Route::get('users-list',array('as'=>'users-list', 'uses'=> 'UsersController@index'));
		Route::get('pikendamine', array('as'=>'pikendamine', 'uses'=>function(){return View::make('iseteenindus.pikendamine.index');}));
	});

	Route::get('uusbaas/client/{id}', function ($id){
		 $client=Client::with('loan')->whereKl_nr($id)->first();


	/*	 $userdata=DB::table('kliendid')
		 	->join('laenud','kliendid.kl_nr','=','laenud.kl_nr')
		 	->where('kliendid.kl_nr','=',$id)
		 	->where('laenud.active_loan','=','1')
		 	->get();*/
		  	$jada=$client->toArray();
//		 array_push($jada['loan']);
		  	

/*
				$dt = Carbon::createFromTimestamp($timestamp);
				$dt->timezone = new DateTimeZone('Europe/Tallinn');
			$dt->setToStringFormat('d-m-Y');
			return $dt;

*/			
	
				//return $veeb->diffInDays($marts);
			 //return	$dt->diffInDays(Carbon::now());
			 	
		  	foreach ($jada['loan'] as $key => $value) {
				  					$timestamp=strtotime($jada['loan'][$key]['created_at']);
								 	$dt=Carbon::createFromTimestamp($timestamp);
								 	$veeb=Carbon::create($dt->year,$dt->month,$dt->day,0,0,0);
								 	$marts=Carbon::create(Carbon::now()->year,Carbon::now()->month,Carbon::now()->day,0,0,0);

//				 	$dt->setToStringFormat('d-m-Y');
				 $jada['loan'][$key]['period']=$veeb->diffInDays(Carbon::now());;
		  	}

		 $jada;
		return  	Response::json([
		 		'data' => $jada

		 		], 200);
	
	//return $client;	
	});
});

Route::get('/valmimisel', function(){
	return View::make('ajutine_rus');
});
Route::get('angular-test', function(){
	return View::make('angular.index');

});
Route::get('qu', function(){
	Queue::push('RemindersController@postRemind', array('message'=>'Test'));
});

Route::get('tagasimaksmine', function(){
	return View::make('tagasimaksmine.index');
});	
Route::post('esmakordne-laenutaotlus','LaonApplicationController@index');
Route::post('ankeet',array('as'=>'ankeet', 'uses'=>'LaonApplicationController@index'));


Route::get('logout', function(){
			Auth::logout();
return Redirect::to('/');
});

Route::group(array('prefix'=>'ru'), function(){
	Route::get('esmakordne-laenutaotlus', function (){
	return View::make('applications.laenutaotlus_rus');
	});	
	Route::get('{page}', 'NavigationController@index');

});
Route::get('ankeet', function(){
	return View::make('applications.ankeet_et');
});
Route::get('esmakordne-laenutaotlus', function (){
	return View::make('applications.ankeet_et');
});
Route::get('/', function()
{
	return View::make('layouts.new');
});



Route::get('{page}', 'NavigationController@index');

View::composer('layouts.*', function ($view){
	
	$navs=App::make('Laeninvest\Repositories\NavigationRepository')->getAll('top');
	$view->with('navs',$navs);
});
View::composer('iseteenindus.*', function ($view){
	
	$navs=App::make('Laeninvest\Repositories\NavigationRepository')->getUserInfo();
	$view->with('client',$navs);
});