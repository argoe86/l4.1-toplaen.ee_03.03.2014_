<?php

class Loanadd extends Eloquent {
	protected $guarded = array();
	protected $table='laenud';
	protected $defaults = array(
		'loan'=>0, 
		'tasutud_laen'=>0, 
		'intress'=>0, 
		'pank'=>0,
		'active_loan'=>1
		);
	protected $primaryKey='ID';
	protected $fillable=array('laen', 'kl_nr', 'tasutud_laen', 'intress', 'pank', 'date', 'active_loan','multirow_id');

	public static $rules = array();

	public function scopeDateDescending($query){
		return $query->orderBy('date, id', 'ASC');
	}
	public function client(){
		//return $this->belongsTo('Client', 'kl_nr','kl_nr');
		return $this->hasOne('Client', 'kl_nr','kl_nr');
	}
    public function setDateAttribute(){

    //  $this->attributes['date'] = Date('Y-m-d H:i:s');
    }


	public function __construct()
    {
        //$this->attributes['date'] = Date('Y-m-d H:i:s');
        $this->attributes['date'] = Date('Y-m-d');
      
    }


}
 