<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Parooli uuendamine</h2>

		<div>
			Laeninvest.ee annab teada, et kui soovite uuendada oma parooli, siis täitke antud lingil olev vorm {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>