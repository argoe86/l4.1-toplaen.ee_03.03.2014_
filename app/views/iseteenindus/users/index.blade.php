@extends('iseteenindus.layouts.master')
@section('iseteenindus')
	<div class="row">
	<table class="table table-striped table-bordered">
		<tr>
			<th style="width:300px">Kliendi number (Kasutajaid kokku {{$userscount}})</th>
			<th>Eesnimi</th>
			<th>Perenimi</th>
			<th>Isikukood</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{$user->kl_nr}}</td>
			<td>{{$user->eesnimi}}</td>
			<td>{{$user->perenimi}}</td>
			<td>{{$user->isikukood}}</td>
		</tr>
		@endforeach
	</table>
	</div>
@stop