<form class="form-inline" role="form">
	<div class="form-group">
		<input type="text" placeholder="Lep nr"  size="3"class="form-control" ng-model="newClient">
	</div>
		{{Form::button('Otsi', array('class'=>"btn btn-success" , 'ng-click'=>'getInfo()'))}}	
	<div class="form-group">
		<input type="text" placeholder="Otsing" size="9"class="form-control">
	</div>

</form>