@extends('layouts.new')
@section('content')
<p class="lead" style="color:red;"><strong>NB: Väljastame laene alates 21 eluaastast.</strong></p>
<p class="lead" style="color:red;"><strong>NB: Договоры о займе заключаем и суммы займа выплачиваем клиентам не моложе 21-го года.</strong></p>


<div class="form-horizontal" >
{{Form::model(array('route'=>'ankeet',  'enctype'=>'multipart/form-data', 'files'=>'true'))}}
	<div><span><h3>Laenutaotlus</h3></span></div>
	<div ></div>

	<div class="row" style="display:none">
		<div class="row">
			<div class="col-lg-12"style="" ng-click="ava.yldtingimused=!ava.yldtingimused" >Üldtingimused</div>
		    <div clasS="col-lg-12" ng-show="ava.yldtingimused">sisu üld</div>

		</div>
		<div class="row">
			<div class="col-lg-12 " ng-click="ava.tarbija=!ava.tarbija">EUROOPA TARBIJAKREDIIDI STANDARDINFO TEABELEHT</div>
			<div class="col-lg-12" ng-show="ava.tarbija">sisu</div>

		</div>

	</div>

	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('eesnimi', 'Eesnimi', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('eesnimi'))
			{{ Form::text('eesnimi','',array('class'=>'form-control error', 'placeholder'=>'Eesnimi'))}}
			@else
			{{ Form::text('eesnimi','',array('class'=>'form-control ', 'placeholder'=>'Eesnimi'))}}
		@endif
		</div>
		{{$errors->first('eesnimi', 'Nime lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('perenimi', 'Perenimi', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('perenimi'))
			{{ Form::text('perenimi','',array('class'=>'form-control error', 'placeholder'=>'Perenimi'))}}
			@else
			{{ Form::text('perenimi','',array('class'=>'form-control ', 'placeholder'=>'Perenimi'))}}
		@endif
		</div>
		{{$errors->first('perenimi', 'Perenimi lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('isikukood', 'Isikukood', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('isikukood'))
			{{ Form::text('isikukood','',array('class'=>'form-control error', 'placeholder'=>'Isikukood'))}}
			@else
			{{ Form::text('isikukood','',array('class'=>'form-control ', 'placeholder'=>'Isikukood'))}}
		@endif
		</div>
		{{$errors->first('isikukood', 'Isikukood lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('elukoht', 'Kodune aadress', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('elukoht'))
			{{ Form::textarea('elukoht','',array('class'=>'form-control error', 'placeholder'=>'Elukoht'))}}
			@else
			{{ Form::textarea('elukoht','',array('class'=>'form-control ','rows'=>'3', 'placeholder'=>'Elukoht'))}}
		@endif
		</div>
		{{$errors->first('elukoht', 'Elukoht lahter on tühi!')}}
		<div class="col-lg-2 text-muted">
			<div class="row"><span>Pärnu mnt 139D/1 - 118,</span></div>
			<div class="row"><span>Tallinn,</span></div>
			<div class="row"><span>Harjumaa,</span></div>

		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('telefon', 'Telefon', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('telefon'))
			{{ Form::text('telefon','',array('class'=>'form-control error', 'placeholder'=>'Telefon'))}}
			@else
			{{ Form::text('telefon','',array('class'=>'form-control ', 'placeholder'=>'Telefon'))}}
		@endif
		</div>
		{{$errors->first('telefon', 'Telefon lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('amet', 'Töökoht', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('amet'))
			{{ Form::text('amet','',array('class'=>'form-control error', 'placeholder'=>'Töökoht'))}}
			@else
			{{ Form::text('amet','',array('class'=>'form-control ', 'placeholder'=>'Töökoht'))}}
		@endif
		</div>
		{{$errors->first('amet', 'Töökoht lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('email', 'Email', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('email'))
			{{ Form::text('email','',array('class'=>'form-control error', 'placeholder'=>'Email'))}}
			@else
			{{ Form::text('email','',array('class'=>'form-control ', 'placeholder'=>'Email'))}}
		@endif
		</div>
		{{$errors->first('email', 'Email ei ole korrektne!')}}
		<div class="col-lg-4">
			<span class="text-muted">Näide: info@paevaraha.ee</span>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-2">	
		{{ Form::label('laenusumma', 'Laenusumma', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('laenusumma'))
			{{ Form::text('laenusumma','',array('class'=>'form-control error', 'placeholder'=>'Laenusumma'))}}
			@else
			{{ Form::text('laenusumma','',array('class'=>'form-control ', 'placeholder'=>'Laenusumma'))}}
		@endif
		</div>
		{{$errors->first('laenusumma', 'Laenusumma lahter on tühi!')}}
		<div class="col-lg-2">
			<span class="text-muted">Näide: 50</span>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('palk', 'Palk', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('palk'))
			{{ Form::text('palk','',array('class'=>'form-control error', 'placeholder'=>'Palk'))}}
			@else
			{{ Form::text('palk','',array('class'=>'form-control ', 'placeholder'=>'Palk'))}}
		@endif
		</div>
		{{$errors->first('palk', 'Palk lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('arveldusarve', 'Arveldusarve', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('arveldusarve'))
			{{ Form::text('arveldusarve','',array('class'=>'form-control error', 'placeholder'=>'Arveldusarve'))}}
			@else
			{{ Form::text('arveldusarve','',array('class'=>'form-control ', 'placeholder'=>'Arveldusarve'))}}
		@endif
		</div>
		{{$errors->first('arveldusarve', 'Arveldusarve lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('dokument_type', 'Dokumendi tüüp', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('dokument_type'))
			{{Form::select('dokument_type', array(''=>'','Pass'=>'Pass', 'ID-kaart'=>'ID-kaart', 'Juhiluba'=>'Juhiluba'), null, array('class'=>'form-control'))}}
			@else
			{{Form::select('dokument_type', array(''=>'','Pass'=>'Pass', 'ID-kaart'=>'ID-kaart', 'Juhiluba'=>'Juhiluba'), null, array('class'=>'form-control'))}}

		@endif
		</div>
		{{$errors->first('dokument_type', 'Dokumendi tüüp lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('dokument_number', 'Dokumendi number ', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('dokument_number'))
			{{ Form::text('dokument_number','',array('class'=>'form-control error', 'placeholder'=>'Dokumendi number '))}}
			@else
			{{ Form::text('dokument_number','',array('class'=>'form-control ', 'placeholder'=>'Dokumendi number '))}}
		@endif
		</div>
		{{$errors->first('dokument_number', 'Dokumendi number  lahter on tühi!')}}
	</div>
	<div class="form-group">
		<div class="col-lg-2">
		{{ Form::label('dokument_exp', 'Dokumendi Kehtivus ', array('class'=>'col-sm-3 control-label'))}}
		</div>
		<div class="col-sm-4">
		@if($errors->has('dokument_exp'))
			{{ Form::text('dokument_exp','',array('class'=>'form-control error', 'placeholder'=>'Dokumendi kehtivus '))}}
			@else
			{{ Form::text('dokument_exp','',array('class'=>'form-control ', 'placeholder'=>'Dokumendi kehtivus '))}}
		@endif
		</div>
		{{$errors->first('dokument_exp', 'Dokumendi kehtivus  lahter on tühi!')}}
	</div>
	
	<div class="row">
		<p style="color:red;">NB: Palume saata ka pangakonto kolme (3) kuu väljavõtte ja saata info@paevaraha.ee emailile digiallkirjastatuna! ( DDOC formaadis )</p>
		<p style="color:red">Просим прислать выписку счета за 3 месяца info@paevaraha.ee</p>
	</div>
		{{Form::submit('Saada', array('class'=>'btn btn-success'))}}

{{Form::close()}}

</div>
@stop
