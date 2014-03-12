@extends('iseteenindus.layouts.master')
@section('iseteenindus')
 
 	@if(Auth::user())


 		<div class="row">
 			<div class="col-lg-4">
 				<div><span>Lp, {{Auth::user()->eesnimi}} {{Auth::user()->perenimi}}</span></div>
 			</div>
 		</div>	

 		


 	@else
 		Sisselogimine ebaõnnestus
 	@endif
@stop
