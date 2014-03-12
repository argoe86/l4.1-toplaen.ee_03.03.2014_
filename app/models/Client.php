<?php

class Client extends Eloquent {
	protected $guarded = array();
	protected $table="kliendid";
	protected $primaryKey="kl_nr";
	
	public static $rules = array();

	public function loan(){

		return $this->hasMany('Loan','kl_nr','kl_nr');
	}

}
