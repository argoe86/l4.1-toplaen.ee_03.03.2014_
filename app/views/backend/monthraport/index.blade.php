<div class="container">
	<div class="row">

		<table class="table table-bordered ">
		<tr>
			<th>Kuupäev</th>
			<th>Eesnimi</th>
			<th>Perenimi</th>
			<th>Telefon</th>
			<th>Tasutud laen</th>
			<th>Intress</th>
			<th>KL_nr</th>
		</tr>
	@foreach($loans as $loan)
			<tr>
				<td>{{$loan->date}}</td>
				<td>{{$loan->client->eesnimi}}</td>
				<td>{{$loan->client->perenimi}}</td>
				<td>{{$loan->client->telefon}}</td>
				<td>{{$loan->tasutud_laen}}</td>
				<td>{{$loan->intress}}</td>
				<td>{{$loan->kl_nr}}</td>

			</tr>

	@endforeach
		</table>
	</div>
</div>

