
					<tr style="color:grey;" ng-repeat="laen in test.loan | orderBy:'date':true | limitTo:'10'" ng-if="laen.active_loan==0" ng-mouseenter="hover(showDelete=true)" ng-mouseleave="hover(showDelete=false)">
					
						<td style="width:150px;">
							<div class="btn-group">
							  <button type="button" class="btn btn-default btn-sm">[[laen.ID]]</button>
							  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
							    <span class="caret"></span>
							    <span class="sr-only">Toggle Dropdown</span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
							    <li></li>
							    <li><a href="#" ng-click="toPassive(laen)">Taasta laen</a></li>
							    <li><a href="#" style="color:red" ng-click="destroy(laen)">Kustuta laen baasist</a></li>
							  </ul>
							</div>
						</td>
						<td>[[laen.date | date:' dd.MM.yyyy']]</td>
						<td>[[laen.laen]]</td>
						<td>[[laen.tasutud_laen]]</td>
						<td>[[laen.intress]]</td>
						<td>[[laen.pank]]</td>
						<td>[[laen.tasutud_laen--laen.intress]]</td>
						<td>[[laen.user]]

					</tr>	