<table class="table table-bordered table-striped table-condsensed table-hover" >
	<th colspan="8" class="text-center">
	Avatud laenud
	</th>
	<tr>
		<th style="width:150px;">	
	<input type="checkbox"   ng-model="mastercheck" ng-click="mastercheck=!mastercheck">

						<div class="btn-group">
						  <button type="button" class="btn btn-default btn-sm">ID/Toimingud</button>
						  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
						    <span class="caret"></span>
						    <span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li class="text-center"></li>
						    <li><a href="#">Vali kõik</a></li>
							<li><a href="#" style="color:red" >Saada arve</a></li>
							<li><a href="#" style="color:red" >Saada M1</a></li>
							<li><a href="#" style="color:red" >Saada M2</a></li>
							<li><a href="#" style="color:red" >Saada M3</a></li>

						  </ul>
						</div>
		</th>
		<th ng-click="reverse=!reverse">Kuupäev</th>
		<th>Laen</th>
		<th>Laenuosa</th>
		<th>Intress</th>
		<th>Pank</th>
		<th >Kokku/Tagasi</th>
		<th ng-model="timediff">K</th>
	</tr>
		<form name="addloansForm" ng-submit="addLoan(this)">
	<tr>
		<td>ID <div >[[checkLoans.loans]]</div></td>
		<td><div><input name="laen" class="form-control"  ng-model="date" size="1" type="text" value="{{date('d-m-Y')}}"></div></td>
		<td><div><input name="laen" class="form-control"  ng-model="laen" size="1" type="text" ></div></td>
		<td><div><input name="tasutud_laen" class="form-control" ng-model="tasutud_laen" size="1" type="text" ></div></td>
		<td><div><input name="intress" class="form-control" ng-model="intress" size="1" type="text" ></div></td>
		<td><div>{{Form::select('pank', array('SWED'=>'SWED', 'SEB'=>'SEB'), 'Swed',array('class'=>'form-control', 'ng-model'=>'pank') )}}</div></td>
		<td><div><input name="total" class="form-control" ng-model="total" size="1" type="text" ></div></td>
		<td>{{Auth::user()->eesnimi}}
		 <button class="btn btn-xs btn-success" type="submit">Lisa</button>		</td>
	</tr>
	<style type="text/css">.green{background-color:green !important;}
	.loangroup{border:1px solid red;}
	</style>
	{{Form::close()}}

<tbody class="loangroup" ng-repeat="mainlaen in loansToFilter() | filter:filterLoans | orderBy:'date':true" ng-if="mainlaen.active_loan==1" >
			<tr  ng-click="open=!open">
				<td>
					<input type="checkbox" ng-checked="mastercheck"   checklist-model="checkLoans.loans" checklist-value="mainlaen.ID" ng-model='select'>
						  <div class="btn-group">
						    <button type="button" class="btn btn-default btn-sm">[[mainlaen.ID]]</button>
						    <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
						      <span class="caret"></span>
						      <span class="sr-only">Toggle Dropdown</span>
						    </button>
						    <ul class="dropdown-menu" role="menu">
						      <li class="text-center"></li>
						      <li><a href="#"ng-click="toPassive(laen)">Sulge laen</a></li>
						      <li><a href="#" style="color:red" ng-click="destroy(laen)">Kustuta laen baasist</a></li>

						    </ul>
						  </div>


				</td>
				<td >[[mainlaen.date |date:'dd.MM.yyyy']]</td>
				<td>[[mainlaen.laen]]</td>
				<td>[[((mainlaen.laen*0.0067)*mainlaen.period--mainlaen.laen).toFixed(2)]] ( [[((mainlaen.laen*0.0067)*mainlaen.period).toFixed(2)]] )</td>
				<td></td>
				<td>[[mainlaen.period]] päev(a)</td>
				<td></td>
				<td></td>
			</tr>
            <tr ng-show="open" ng-repeat="laen in loans|filter:{multirow_id: mainlaen.multirow_id}|orderBy:'date':true"  id="row_[[laen.ID]]" >

                <td>
                @include('backend.loans.seaded_button.index')

                </td>
                <td>[[laen.date | date:'dd.MM.yyyy']]</td>
                <td>[[laen.laen ]]</td>
                <td>[[laen.tasutud_laen.toFixed(2)]]</td>
                <td>[[laen.intress.toFixed(2)]]</td>
                <td>[[laen.pank]]</td>
                <td>[[(laen.tasutud_laen--laen.intress).toFixed(2) ]]</td>
                <td>[[laen.user]]

                </td>

	        </tr>

	</tbody>

    
</table>