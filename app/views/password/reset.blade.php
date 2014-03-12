@extends('layouts.new')
@section('content')
	<h1>Parooli uuendamine</h1>
<div class="col-lg-3">

	{{Form::open()}}
		<input type="hidden" name="token" value="{{$token}}">

		<div class="form-group">
			{{Form::label('email', 'Emaili aadress')}}
			{{Form::email('email','', array('class'=>'form-control'))}}
		</div>
		<div>
			{{Form::label('password', 'Parool')}}
			{{Form::password('password', array('class'=>'form-control'))}}
		</div>
		<div>
			{{Form::label('password_confirmation', 'Sisesta parool uuesti')}}
			{{Form::password('password_confirmation', array('class'=>'form-control'))}}
		</div>
		{{Form::submit('Kinnita')}}

	@if(Session::has('error'))
		<p style="color:red">{{Session::get('error')}}</p>
	@elseif (Session::has('status'))
		<p>{{Session::get('status')}}</p>
	@endif
</div>
@stop