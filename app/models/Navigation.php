<?php

class Navigation extends Eloquent {
	protected $table='navigations_l4';
	protected $primaryKey='id';
	protected $guarded = array();

	public static $rules = array();

	public function article(){
		return $this->hasOne('Article');
	}
}
