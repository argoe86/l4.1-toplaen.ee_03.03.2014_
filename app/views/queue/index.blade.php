<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Parooli Uuendamine</h2>

		<div>
			Laeninvest.ee annab teada, et kui soovite uuendad oma parooli, siis täitke antud lingil olen vorm {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>