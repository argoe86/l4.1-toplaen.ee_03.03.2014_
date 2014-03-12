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