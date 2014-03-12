<?php

class Applications extends Eloquent {
	protected $table = "esmakordsed_laenutaotlused";
	protected $guarded = array();
	public static $rules = array();
	public function __construct()
    {
        $this->attributes['date'] = Date('Y-m-d H:i:s');
        $this->attributes['ip']=Request::getClientIp();
	  //$this->attributes['http_referer']=Request::referrer();
        $this->attributes['eesnimi'] = Auth::user()->eesnimi;
        $this->attributes['perenimi'] = Auth::user()->perenimi;
        $this->attributes['isikukood'] = Auth::user()->isikukood;
        $this->attributes['markus'] = 'Lepingu number '.Auth::user()->kl_nr;

    }
}
