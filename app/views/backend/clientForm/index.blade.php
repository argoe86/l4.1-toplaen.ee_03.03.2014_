<form ng-submit="updateClientForm()" ng-model="clientForm" >

<style type="text/css">
	.client-form{
		margin:0px;

	}
	.client-form input{
	
	
	}
</style>

	<div class="form-group client-form" >
{{Form::text('kliendid_date','[[test.kliendid_date]]', array('class'=>'form-control', 'ng-model'=>'kliendid_date'))}}

	</div>
	<div class="form-group client-form">
{{Form::text('eesnimi','[[test.eesnimi]]', array('class'=>'form-control' ,'ng-model'=>'eesnimi'))}}

	</div>

	<div class="form-group client-form">
{{Form::text('perenimi','[[test.perenimi]]', array('class'=>'form-control', 'ng-model'=>'perenimi'))}}

	</div>
	<div class="form-group client-form">
{{Form::textarea('elukoht','', array('class'=>'form-control','value'=>'[[test.elukoht]]', 'rows'=>'2', 'ng-model'=>'elukoht'))}}
	</div>
	<div class="form-group client-form">
{{Form::text('telefon','[[test.telefon]]', array('class'=>'form-control', 'ng-model'=>'telefon'))}}

	</div>
	<div class="form-group client-form" >
{{Form::text('arveldusarve','[[test.arveldusarve]]', array('class'=>'form-control', 'ng-model'=>'arveldusarve'))}}

	</div>
	<div class="form-group client-form">
{{Form::text('email','[[test.email]]', array('class'=>'form-control', 'ng-model'=>'email'))}}

	</div>
	<div class="form-group client-form">
{{Form::text('amet','[[test.amet]]', array('class'=>'form-control', 'ng-model'=>'amet'))}}

	</div>
	<div class="form-group client-form">
{{Form::text('palk','[[test.palk]]', array('class'=>'form-control', 'ng-model'=>'palk'))}}

	</div>
    <button class="btn btn-success" type="submit">Uuenda</button>
{{Form::close()}}