<?php namespace Laeninvest\Repositories;

use Client;
use Loan;
use Carbon\Carbon;
use DateTimeZone;
class ReminderRepository implements ReminderRepositoryInterface {
	protected $kl_nr;
	protected $laeninvest_M1=10;
	protected $laeninvest_M2=23;
	protected $laeninvest_M3=42;
	protected $LID;
	protected $halfMonthIntrest;

	public function setLoanId($LID){
		$this->LID=$LID;
	}
	public function getLoanDate($LoanID){
		$laen= Loan::whereId($LoanID)->first()->unix_timestamp;
		return $this->convertDateToEstonia($laen);
	}
	public function getActiveLoanDays($loanID){
				
		return $this->getLoanDate($loanID)->diffInDays(Carbon::now());

	}
	public function getRemainingDays($loanID){
				
		return $this->getLoanDate($loanID)->diffInDays(Carbon::now());

	}
	public function getOneMonthFutureDate($loanID){
		return 	$this->getLoanDate($loanID)->addMonths(1)->diffInDays(Carbon::now());
	}
	public function getIntressProtsent($loanID){
		$r=0;
		if($this->getLoanDate($loanID)->diffInMonths(Carbon::now())==0)
		{
			if($this->getActiveLoanDays($loanID)<=15 && $this->getActiveLoanDays($loanID)>=1)
				{$r=0.1;}
			elseif($this->getActiveLoanDays($loanID)>=15 && $this->getActiveLoanDays($loanID)<=Carbon::now()->daysInMonth)
				{$r=0.2;}
		}
		return  $r;
	}
	public function getMonthIntressAndLoanSum($loanID){
		$r=0;
		if($this->getLoanDate($loanID)->diffInMonths(Carbon::now())==0)
		{
			if($this->getActiveLoanDays($loanID)<=15 && $this->getActiveLoanDays($loanID)>=1)
				{$r=1.1;}
			elseif($this->getActiveLoanDays($loanID)>=15 && $this->getActiveLoanDays($loanID)<=Carbon::now()->daysInMonth)
				{$r=1.2;}
		}
		return  $r;
	}
	public function getInsideIntressWithInjectedValue($number){
		$r=0;
			if($number<=15 && $number>=1)
				{$r=0.1;}
			elseif($number>=15 && $number<=Carbon::now()->daysInMonth)
				{$r=0.2;}
			return $r;
	}
	public function getFullPaybackRow($loanID){

			$intressInMonths=(($this->getLoanById($loanID)*0.2)*($this->getMonthsWithLoan($loanID)));
			$intressFirstMonth=$this->getLoanById($loanID);
			$intressAfterFullMonths=$this->getLoanById($loanID)*$this->getInsideIntressWithInjectedValue($this->getDaysAfterFullMonths($loanID));
			$paidIntresses=$this->getPaidIntressesPerLoanID($loanID);
			$sumi=$intressFirstMonth+$intressInMonths+$intressAfterFullMonths-$paidIntresses;
		return $sumi;
	}
	public function getLastPartialPayment($loanID){
		$mr=$this->getMultiRowID($loanID);
		return Loan::whereActive_loan(1)->whereMultirow_id($mr)->where('tasutud_laen','!=','')->first();
	}
	public function getNextPaymentDate($loanID){
		return Loan::whereMultirow_id($this->getMultiRowID($loanID))->where('tasutud_laen','!=','')->first();
	}
	public function getFullPaybackSum(){
		$sum=0;
		$laenud=Loan::whereActive_loan(1)->where('laen','!=','')->whereKl_nr(1136)->orderBy('date', 'DESC')->get();
		foreach ($laenud as $laen) {
			$intressInMonths=(($laen->laen*0.2)*($this->getMonthsWithLoan($laen->ID)));
			$intressFirstMonth=$laen->laen;
			$intressAfterFullMonths=$laen->laen*$this->getInsideIntressWithInjectedValue($this->getDaysAfterFullMonths($laen->ID));
			$sumi=$intressFirstMonth+$intressInMonths+$intressAfterFullMonths;
			$sum+=$sumi;
		}
		return $sum;
	}
	public function getMonthsWithLoan($loanID){


		 return	$this->getLoanDate($loanID)->diffInMonths(Carbon::now());
		 
	}
	public function getNextPaymentDateOutput($loanID){
		$this->getMonthsWithLoanPartialPayment($loanID);
	}
	public function getMonthsWithLoanPartialPayment($loanID){


		 return	$this->getNextPaymentDate($loanID)->diffInMonths(Carbon::now());
		 
	}
	public function getDateAfterFullMonths($loanID){
				 //$kl_nr=$this->kl_nr;

			return 	$this->getLoanDate($loanID)->addMonths($this->getMonthsWithLoan($loanID));		

	}
	public function getDaysAfterFullMonths($loanID){
				 //$kl_nr=$this->kl_nr;

			return $this->getDateAfterFullMonths($loanID)->diffInDays(Carbon::now());		
	}
	public function getIntressAfterFullMonths($loanID){
		return $this->getDateAfterFullMonths($loanID)->diffInDays(Carbon::now());
	}
	public function getLoanById($loanID){
		return Loan::whereId($loanID)->first()->laen;
	}
	public function getMultiRowID($loanID){
		return Loan::whereId($loanID)->whereActive_loan(1)->where('laen','!=','')->first()->ID;
	}
	public function getPaidIntressesPerLoanID($loanID){
		//$this->getMultiRowID($loanID);
		return Loan::whereMultirow_id($this->getMultiRowID($loanID))->sum('intress');
	}
	public function getPaidPartialLoans($loanID){
		return Loan::whereMultirow_id($this->getMultiRowID($loanID))->whereActive_loan(1)->sum('tasutud_laen');
	}




	public function setKl_nr($kl_nr){
		$this->kl_nr=$kl_nr;
	}
	public function getAll(){
		return  $this;

	}
	public function getData()
	{
		return Client::all();
	}
	public function paidInterest(){
		return Loan::whereKl_nr($this->kl_nr)->whereActive_loan(1)->sum('intress');
	}
	public function leftInterest(){
		return $this->interest() - $this->paidInterest();
	}
	public function inkasso($summa){
		return $summa*1.2;
	}
	public function loanWithInterest(){

		return $this->activeLoan($this->kl_nr)->laen+$this->interest($this->kl_nr)-$this->paidInterest();
	}
	public function loanWithInterestWithM1(){

		return $this->activeLoan($this->kl_nr)->laen+$this->interest($this->kl_nr)-$this->paidInterest()+$this->laeninvest_M1;
	}
	public function interest(){
		$kl_nr=$this->kl_nr;

		if($this->daysAfterFullMonths($kl_nr)>=1  && $this->daysAfterFullMonths($kl_nr)<=15)
		{		$this->halfMonthIntrest=$this->activeLoan($kl_nr)->laen*0.1;	}
		elseif($this->daysAfterFullMonths($kl_nr)>=16  && $this->daysAfterFullMonths($kl_nr)<=Carbon::now()->daysInMonth)	
		{$this->halfMonthIntrest=$this->activeLoan($kl_nr)->laen*0.2;

		}
			
			return $intress=$this->activeLoan($kl_nr)->laen*0.2*$this->monthsWithLoan($kl_nr)+$this->halfMonthIntrest;
	}
	public function activeLoan(){
		 $kl_nr=$this->kl_nr;

		return Loan::whereKl_nr($kl_nr)->whereActive_loan(1)->first();

	}
	public function allClientLoans(){
				return Loan::whereKl_nr($kl_nr)->whereActive_loan(1)->where('laen','!=',0)->get();

	}
	public function overdue(){}
	public function loanDate(){
				 $kl_nr=$this->kl_nr;

		$loandate= Loan::whereKl_nr($kl_nr)->whereActive_loan(1)->first()->unix_timestamp;
		return $this->convertDateToEstonia($loandate);
	}
	public function loanExpiryDate(){
				 $kl_nr=$this->kl_nr;
		return  $this->loanDate($kl_nr)->addMonth();
	}
	public function daysWithLoan(){
				 $kl_nr=$this->kl_nr;

		return $this->loanDate($kl_nr)->diffInDays(Carbon::now());

	}

	public function monthsWithLoan(){
				 $kl_nr=$this->kl_nr;

		 return	$this->loanDate($kl_nr)->diffInMonths(Carbon::now());
		 
	}
	public function dateAfterFullMonths(){
				 $kl_nr=$this->kl_nr;

			return 	$this->loanDate($kl_nr)->addMonths($this->monthsWithLoan($kl_nr));		

	}
	public function daysAfterFullMonths(){
				 $kl_nr=$this->kl_nr;

			return $this->dateAfterFullMonths($kl_nr)->diffInDays(Carbon::now());		
	}
	public function convertDateToEstonia($timestamp){
				//$timestamp = Carbon::now()->timestamp;
				$dt = Carbon::createFromTimestamp($timestamp);
				$dt->timezone = new DateTimeZone('Europe/Tallinn');
			$dt->setToStringFormat('d-m-Y');
			return $dt;
	}
}
