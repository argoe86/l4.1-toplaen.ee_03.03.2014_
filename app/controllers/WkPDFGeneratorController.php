<?php
use Carbon\Carbon;
class WkPDFGeneratorController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($isikukood)
	{		

		 	 $paevaraha_model=Application::whereId($isikukood)->first();
		 	 //$client=Client::find($pages);
		 	 $laen=$paevaraha_model->laenusumma;
		 	// $laen=150;
		 	 $today=Carbon::today();
		 	 $template='pdf.template.paevaraha_leping';

 		 	$klient_nr=(Client::where('kl_nr','!=','')->where('kl_nr','<','10000')->orderBy('kl_nr','DESC')->first()->kl_nr)+1;
		 	 //$klient_nr=100;
		 	 $intress=$laen*0.0067;
		 	 $summakokku=$laen+$intress;
		 	 $jada=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
		 	 
   return   	 $pdf=WkPDF::html('pdf.index', compact('template','jada', 'intress', 'summakokku', 'laen', 'paevaraha_model', 'today', 'klient_nr'),$paevaraha_model->isikukood);
	//return $pdf->output('2089.pdf');
       //return $pdf->stream();
	}
	public function monthRaport(){
		  $loans=Loan::with('client')->whereActive_loan(1)->get();
		  	
		  $template='backend.monthraport.index';
        return $pdf=WkPDF::html('pdf.index', compact('loans', 'template'));
		
	}
	public function laeninvest($pages)
	{		
		
		 	 $client=Client::find($pages);
		 	 $laen=150;
		 	 $intress=$laen*0.0067;
		 	 $summakokku=$laen+$intress;

		 	 $jada=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
   return   	 $pdf=WkPDF::html('pdf.index', compact('client', 'jada', 'intress', 'summakokku', 'laen', 'paevaraha_model'),$client->kl_nr);
	//return $pdf->output('2089.pdf');
       //return $pdf->stream();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function send(){
 		Mail::send('emails.body.index', [],function($message)
		{

				$message->to('argoe.erit@gmail.com', 'Argo Erit')->subject('katse');
				$client=Client::find('2088');
      			$pdf=WkPDF::html('pdf.index', compact('client'));

				$pdf->save('leping.pdf');
				$message->attach('leping.pdf');
		});
		return "Done";
	}
	public function create()
	{	
	 //$input= Input::all();
       $paevaraha_model=Client::find(100);
           return 	 $pdf=WkPDF::html('pdf.index', compact('paevaraha_model'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$save=File::put(app_path()."/views/pdf/template/paevaraha_leping.blade.php", HTML::decode(Input::get('editor1')));
		if($save) 
			return Redirect::back();
		else
			return "Viga";

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('pdfgenerators.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$client=Client::find('2001');
        $template=File::get(app_path()."/views/pdf/template/paevaraha_leping.blade.php");
		$template=HTML::decode($template);
	
        return View::make('pdf.edit', compact('template', 'client'));
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
