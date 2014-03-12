<?php

class Loan extends Eloquent {
	protected $guarded = array();
	protected $table='laenud';
	protected $defaults = array(
		'loan'=>0, 
		'tasutud_laen'=>0, 
		'intress'=>0, 
		'pank'=>0
		
		);
	protected $primaryKey='kl_nr';
	protected $fillable=array('laen', 'kl_nr', 'tasutud_laen', 'intress', 'pank', 'date', 'multirow_id');

	public static $rules = array();

	public function scopeDateDescending($query){
		return $query->orderBy('date, id', 'ASC');
	}
	public function client(){
		//return $this->belongsTo('Client', 'kl_nr','kl_nr');
		return $this->hasOne('Client', 'kl_nr','kl_nr');
	}
    public function setDateAttribute(){

      $this->attributes['date'] = Date('Y-m-d H:i:s');
    }
    public function getActiveLoanAttribute($value){
    	return (boolean) $value;
    }

}