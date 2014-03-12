<?php

class Application extends Eloquent {
	protected $table = "esmakordsed_laenutaotlused";
	protected $guarded = array();
	
	public static $rules = array();
	public function __construct()
    {
        $this->attributes['date'] = Date('Y-m-d H:i:s');
        $this->attributes['ip']=Request::getClientIp();
        //$this->attributes['http_referer']=Request::referrer();
    }
}
