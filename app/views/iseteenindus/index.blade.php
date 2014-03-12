@extends('layouts.new')
@section('content')
<div class="col-lg-4">

	<div class="row">
		<div class="col-lg-8 ">
			{{ Form::open(array( 'class'=>'form-signin'))}}
				{{ Form::text('username', '', array('class'=>'form-control', 'placeholder'=>'Kasutaja'))}}
				
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Parool'))}}
				{{ Form::submit('Logi sisse', array('class'=>'btn btn-md btn-primary btn-block '))}}
			{{ Form::close()}}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 ">
			<span>Küsimused ja info?</span>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 ">
				<a class="btn btn-success btn-lg toggle glyphicon glyphicon-earphone pull-right" style="font-size:23px"  href="tel:56680344"data-hide-this="true">
					56680344<i class="icon-chevron-right icon-white"></i>
				</a>
		</div>
	</div>
</div>
			
@stop