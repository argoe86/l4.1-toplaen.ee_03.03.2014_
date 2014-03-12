<!DOCTYPE html>
<html>
<head>
	<title>Raamat</title>
</head>
<body>
<table>
@foreach($raamat as $row)
	<tr>
		<td>{{$row->date}}</td>
		<td>{{$row->client->eesnimi}} {{$row->client->perenimi}}</td>
		<td>{{$row->laen}}</td>
	</tr>
@endforeach
</table>
</body>
</html>