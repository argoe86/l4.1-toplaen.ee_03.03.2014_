<?php namespace Laeninvest\Repositories;

use Navigation;
class NavigationRepository{

	public function getAll($pos="top"){
	$menu=Navigation::wherePosition($pos)->whereLanguage('et')->orderBy('id')->get();
		return $menu;

	}


}

	
?>