@extends('iseteenindus.layouts.master')
@section('iseteenindus')
<div class="row">
@include('iseteenindus.loans.create')
</div>	
<div class="row" >
	<div class="col-lg-12">
		<table class="table table-bordered table-striped">
			<tbody class="table-hover">
			<th colspan="9" class="text-center" style="font-size:20px;">Laenud</th>
			<tr>
				<th>Ava</th>
				<th>Kuupäev</th>
				<th>Laenusumma</th>
				<th>Päevad</th>
				<th>Tasutud laen </th>
				<th>Tasutud intress </th>
				<th>Tagasimakse täna</th>
				<th>Tagasimakse kuupäev</th>
				<th>Järgmine makse</th>
				<th style="color:red">Makse selgitus</th>
			</tr>
			@if(!$laenud)
			<tr><td colspan="6" class="text-center">Hetkel aktiivsed laenud puuduvad.</td></tr>
			@else
			@foreach($laenud as $loan)
			<tr>
				<td  ng-click="getInfo()" class=" btn glyphicon glyphicon-chevron-down" style="width:45px;"></td>
				<td >{{$laen->getLoanDate($loan->ID)}}</td>
				<td>{{$loan->laen}} eurot</td>
				<td>{{$laen->getActiveLoanDays($loan->ID)}} ( {{$laen->getOneMonthFutureDate($loan->ID)}} päeva makseni ) {{$laen->getMonthsWithLoan($loan->ID)}}k {{$laen->getDaysAfterFullMonths($loan->ID)}}p</td>
				<td>{{$laen->getPaidPartialLoans($loan->ID)}}</td>
				<td></td>
				<td>{{$laen->getFullPaybackRow($loan->ID)}}</td>
				<td>{{--setTime($laen->getNextPaymentDate($loan->ID)->unix_timestamp)->addMonth()--}} ||{{setTime($loan->unix_timestamp)->addMonth()}}</td>
				<td>{{$loan->laen*1.2}} </td>
				<td>Klient nr: {{Auth::user()->kl_nr}}</td>
				<!--<td style="background-color: rgb(92, 184, 92);color:white;font-size:18px;">Aktiivne</td>-->

			</tr>
			<tr ng-repeat="subloan in loans" ng-if="subloan.active_loan==1">
					<td></td>
					<td>[[subloan.date]]</td>
					<td></td>
					<td></td>
					<td>[[subloan.tasutud_laen]]</td>
					<td>[[subloan.intress]]</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
			</tr>
			@endforeach
			@endif
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th>Kokku: {{$laen->getFullPaybackSum()}} eurot</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			</tbody>
		</table>
@if(Auth::user()->kl_nr==100)
		<table class="table table-bordered table-striped">
		<th colspan="4" class="text-center" style="font-size:20px;">Tagasimakse graafik</th>
			<tr>
				<th>Maksekuupäev</th>
				<th>Põhiosa</th>
				<th>Intress %</th>
				<th>Kuumakse</th>

			</tr>

		</table>
@endif
	</div>
</div>	
@stop