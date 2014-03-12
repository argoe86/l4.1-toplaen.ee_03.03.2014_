<?php

class Laon extends Eloquent {
	protected $table="laenud";
	protected $primaryKey="ID";
	protected $guarded = array();

	public static $rules = array();
}
