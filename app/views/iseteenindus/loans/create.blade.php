<div class="col-lg-12">
<div class="form-group " style="border:1px solid lightgrey;padding:10px;">
{{Form::model(array('action'=>'LoanApplicationController@index'))}}
	<div class="col-lg-2">
	{{ Form::label('laenusumma', 'Laenusumma', array('class'=>'col-lg-2 control-label' , 'style'=>'font-size:20px;'))}}
	</div>
	<div class="col-lg-2">
	@if($errors->has('laenusumma'))
		{{Form::select('laenusumma',array(
				'30'=>'30', '50', '100', '150', '200', '250', '300'
		), '30', array('class'=>'form-control', 'size'=>'7', 'style'=>'width:100px'))}}		
		@else
		{{Form::select('laenusumma',array(
				'30'=>'30', '50'=>'50', '100'=>'100', '150'=>'150', '200'=>'200', '250'=>'250','300'=>'300'
		), '30', array('class'=>'form-control', 'size'=>'7', 'style'=>'width:100px'))}}
	@endif
	</div>
	{{Form::submit('Kinnita laen', array('class'=>'btn btn-sm btn-success'))}}
	{{Form::close()}}
	{{$errors->first('laenusumma', 'Laen lahter on tühi!')}}
	<div class="clearfix"></div>
</div>
</div>
