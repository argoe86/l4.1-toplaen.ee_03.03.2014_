
				<table class="table table-bordered table-striped table-condsensed table-hover">
					<th colspan="8" class="text-center">
					Ajalugu
					</th>
					<tr>
						<th>ID/Toimingud</th>
						<th >Kuupäev</th>
						<th>Laen</th>
						<th>Laenuosa</th>
						<th>Intress</th>
						<th>Pank</th>
						<th>Kokku</th>
						<th>K</th>
					</tr>

	<tbody class="loangroup" ng-repeat="mainlaen in loansToFilter() | filter:filterLoans | orderBy:'date':true" ng-if="mainlaen.active_loan==0" >
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
				<td>[[(mainlaen.laen*1.0067).toFixed(2)]]</td>
				<td am-time-ago="mainlaen.date"></td>
				<td>[[mainlaen.date]]</td>
				<td></td>
				<td></td>
			</tr>
            <tr ng-show="open" ng-repeat="laen in loans|filter:{multirow_id: mainlaen.multirow_id}|orderBy:'date':true"  id="row_[[laen.ID]]" >

                <td>
						                	<input type="checkbox"  ng-checked="mastercheck" checklist-model="checkLoans.loans" checklist-value="laen.ID"  >
						  <div class="btn-group">
						    <button type="button" class="btn btn-default btn-sm">[[laen.ID]]</button>
						    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
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