<?php
use Carbon\Carbon;
use Laeninvest\Repositories\ReminderRepositoryInterface;

class IseteenindusLoanController extends BaseController {
	protected $client;

	public function __construct(ReminderRepositoryInterface $client)
	{
		$this->client = $client;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index_json(){
		$laenud=Loan::whereActive_loan(1)->where('laen','!=','')->whereKl_nr(1136)->orderBy('date', 'DESC')->get();
	}
	public function index()
	{
	//	$this->client->setKl_nr(Auth::user()->kl_nr);
		 $laen=$this->client;		

	//return $navs=App::make('Laeninvest\Repositories\NavigationRepository')->getUserInfo();
 	//return $loans= Client::$this->getUserInfo()->get();
	//return Loan::dateDescending()->whereKl_nr(2000)->get();
		//return Client::with('loan')->whereKl_nr(2000)->get();
		$laenud=Loan::whereActive_loan(1)->where('laen','!=','')->whereKl_nr(1136)->orderBy('date', 'DESC')->get();
		//$client=Client::whereKl_nr(2000)->first();

	// return  $loans=Client::with('loan')->whereKl_nr(2000)->first();
	  
	  
	 //	$tim->setToStringFormat('d-m-Y');
	   //$tim->addMonth();
	//  return $loans->loan[0]->date;

		 return View::make('iseteenindus.loans.index', compact('laenud', 'laen', 'allTransactions'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('iseteenindusloans.create');
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
        return View::make('iseteenindusloans.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('iseteenindusloans.edit');
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
