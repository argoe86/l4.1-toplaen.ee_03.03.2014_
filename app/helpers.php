<?php 
use Laeninvest\Repositories\ReminderRepositoryInterface;

use Carbon\Carbon;
function set_active($path, $active='active'){

	return Request::is($path)? $active:'';
}
function setTime($loanstart){
	$cT=Carbon::createFromTimestamp($loanstart);
	$cT->setToStringFormat('d-m-Y');
	
return $cT;
}