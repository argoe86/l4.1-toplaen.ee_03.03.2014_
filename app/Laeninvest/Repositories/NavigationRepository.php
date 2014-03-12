<?php namespace Laeninvest\Repositories;
use Auth;
use Navigation;
use Client;
class NavigationRepository{

	public function getAll($pos="top"){
	$menu=Navigation::wherePosition($pos)->whereLanguage('et')->orderBy('id')->get();
		return $menu;

	}
	public function getUserInfo()
	{
			 return  $loans=Client::whereKl_nr(Auth::user()->kl_nr)->first();

	}


}

	
?>