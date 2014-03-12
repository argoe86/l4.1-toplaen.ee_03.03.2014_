@extends('iseteenindus.layouts.master')
@section('iseteenindus')
	<div class="row">
		<div class="col-lg-3">
		{{Form::open(array('method'=>'post', 'action'=>'users.store'))}}
			{{Form::text('username', '', array('class'=>'form-control'))}}
			{{Form::password('password', array('class'=>'form-control'))}}
			{{Form::submit('Lisa uus kasutada' , array('class'=>' btn btn-xs btn-primary form-control'))}}
		{{Form::close()}}
		</div>
	</div>
@stop