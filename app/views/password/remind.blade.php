@extends('layouts.new')
@section('content')
<div class="col-lg-4 ">
	<h1>Soovid uuendada parooli?</h1>
	{{Form::open(array('url'=>'password/remind-queue', 'method'=>'post'))}}
	<div class="form-group">
		{{Form::label('email', 'Emaili aadress')}}
		{{Form::email('email','', array('class'=>'form-control', 'placeholder'=>'Emaili aadress'))}}
	</div>
		{{Form::submit('Reset', array('class'=>'form-control', 'class'=>'btn btn-sm btn-danger'))}}
	{{Form::close()}}
	@if(Session::has('error'))
		<p style="color:red">{{Session::get('error')}}</p>
	@elseif (Session::has('status'))
		<p>{{Session::get('status')}}</p>
	@endif
</div>
@stop