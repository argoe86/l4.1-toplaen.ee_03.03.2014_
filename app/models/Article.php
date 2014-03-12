<?php

class Article extends Eloquent {
	protected $guarded = array();
	protected $table='articles';
	protected $primaryKey='id';
	public static $rules = array();

	public function navigation(){

		return $this->belongsTo('navigation');
	}
}
