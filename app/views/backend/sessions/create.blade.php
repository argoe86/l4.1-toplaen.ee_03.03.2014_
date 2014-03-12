<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Restricted Area</title>

<link rel="stylesheet" href="http://www.laeninvest.ee/baas/css/reset.css">
<link rel="stylesheet" href="http://www.laeninvest.ee/baas/css/text.css">
    {{ HTML::style('assets/css/bootstrap.css'); }}
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top:100px;">
		<div class="col-lg-4"></div>
			<div class="col-lg-4" style="border:1px solid lightgrey; padding:40px;">
				<div class="row"><div class="col-lg-12">Investhaus Pluss OÜ</div></div>
				<div class="row"><div class="col-lg-12">
					{{Form::open(array('class'=>'form-signin','route'=>'bcsession.store', 'method'=>'post'))}}
						<div class="from-group">
						{{Form::text('username','', array('class'=>'form-control', 'placeholder'=>'Kasutaja'))}}
						</div>
						<div class="form-group">
						{{Form::password('password', array('class'=>'form-control','placeholder'=>'Parool'))}}
						</div>
						<div class="form-group">
						{{Form::submit('Logi sisse', array('class'=>'form-control btn btn-success '))}}
						</div>
					{{Form::close()}}
				</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4"></div>

	</div>
</body>
</html>