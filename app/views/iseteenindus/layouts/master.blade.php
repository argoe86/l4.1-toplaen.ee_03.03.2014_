@extends('layouts.new')
@section('content')
	<div class="row">
		<div class="col-lg-3">
			<span>Lp, {{$client->eesnimi}} {{$client->perenimi}}</span>
		</div>
	</div>
	<div class="row">@include('iseteenindus.layouts.nav')</div>
	<div class="row" style="margin-top:5px;">@yield('iseteenindus')</div>

@stop