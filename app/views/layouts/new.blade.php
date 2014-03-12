<!DOCTYPE html>
<html ng-app="iseteenindus" ng-controller="IseController">
<head>
<meta charset="UTF-8">

	<!--{{--<title>InvestInkasso - @if(!Auth::user()){{$menu->menu_name}}@endif</title>--}}-->
		<title>Päevaraha</title>
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Sans" />
        <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{ HTML::style('assets/css/bootstrap.css'); }}
    {{HTML::style('assets/css/angular-slider.min.css')}}


   
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    {{ HTML::script('assets/js/bootstrap.js'); }}
	{{HTML::script('assets/js/angular.min.js')}}
<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.10.0.js"></script>
    <script src="http://paevaraha.ee/assets/js/ckeditor/ckeditor.js"></script>
    {{HTML::script('assets/js/iseteenindus.js')}}
    {{HTML::script('assets/js/bootstrap-datepicker.js')}}

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular-touch.min.js"></script>
    {{HTML::script('assets/js/angular-slider.min.js')}}



<style type="text/css">
body{
background-image:url(http://paevaraha.ee/assets/images/toplaen.jpg);
background-size: 100%;
background-repeat: no-repeat;
background-attachment: fixed;
}
.flash{font-size:20px;padding:1em;border:1px dotted black;text-align:center;width:100%;background: #e74c3c;color:white}
.nav li a{color:white;}
#map-canvas{
	height:350px;
	width:350px;
}
body{padding-top:70px;height:100%;
font-family:'Open Sans', Arial, sans-serif;
}
.diag-announcement{}
.slogan{
	font-size: 50px;
	color:red;
	line-height: 50px;
}
h3{}
.divshadow{}
.iseteenindus ul li a{color:black;}
.error{
	border:1px solid red;
	background-color: #f2dede;
}
</style>
<script type="text/javascript"></script>
<body>	
	<nav id="top-navigation" class="navbar navbar-inverse navbar-transparent navbar-fixed-top" role="navigation">

	<div class="container">
			  <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header navbar-center">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a href="{{URL::to('/')}}"class="navbar-brand" href="#">Päevaraha</a>
			  </div>

			  <!-- Collect the nav links, forms, and other content for toggling -->
			  <div class="collapse navbar-collapse navbar-center" id="bs-example-navbar-collapse-1">
			    <ul class="nav navbar-nav">
			   
			    	@foreach($navs as $nav)

			  		    <li><a href="{{URL::to($nav->url)}}">{{$nav->title}}</a></li>

			     	@endforeach
			     	@if(Auth::user())
			     	<li><a href="{{URL::to('logout')}}" class="btn btn-md btn-danger pull-right" style="color:white;">Logi välja</a></li>
			     	@endif
			     	<li><a href="{{URL::route('iseteenindus')}}" class="btn btn-md btn-success pull-right" style="color:white;">Iseteenindus</a></li>

			    </ul>
	
			  </div><!-- /.navbar-collapse -->
				
		</div>
	</nav>
@if(Request::path()=='/')
<div id="intro" style="height:auto;">
	<div class="container">
	
			<div class="well" style="background-image:url(http://paevaraha.ee/assets/images/paevaraha.png);background-size:100%;background-repeat:no-repeat;height:110px;">
				
			</div>
			<div class="pull-left diag-announcement btn btn-danger">
					<a href="valmimisel" style="text-decoration:none;color:white">По-Русски</a>
			</div>
			<div class="jumbotron">
				<div class="col-lg-8">
						<div class="slogan">Laena nii vähe kui võimalik, aga nii palju kui vajalik!</div>
						<p class="lead">Laenud 25-300 eurot.</p>
						<p>100 eurot 8 päevaks 105.36 tagasi.</p>
						<p>
						 Esmakordsel väljastamisel kuni 150 eurot.
						</p>
						<a class="btn btn-primary btn-lg toggle " href="{{URL::to('esmakordne-laenutaotlus')}}"data-hide-this="true">
							Täida laenutaotlus
							<i class="icon-chevron-right icon-white"></i>
						</a> 
						<p style="color:red"><strong>NB: Sularahas laenu ei väljastata.</strong></p>
				      	<div class="calendar" data-provide="datepicker"></div>

				</div>
				<div class="col-lg-4" >
					<div class="row"  style="display:none;"><p>Iseteeninduse avame 02.2014 jooksul</p></div>
					@if(!Auth::user())
					<div class="row"  style="display:none;">
						<div class="col-lg-8 pull-right">
							{{ Form::open(array( 'class'=>'form-signin', 'url'=>'iseteenindus/login', 'method'=>'post'))}}
								{{ Form::text('username', '', array('class'=>'form-control', 'placeholder'=>'Kasutaja'))}}
								
								{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Parool'))}}
								{{ Form::submit('Logi sisse', array('class'=>'btn btn-md btn-primary btn-block '))}}
							{{ Form::close()}}
						</div>
					</div>
					@else
					<dov class="row" >
						<div class="col-lg-8 pull-right">
							<span>Lp, {{Auth::user()->eesnimi}} {{Auth::user()->perenimi}}</span>
						</div>
					</dov>
					@endif
					<div class="row">
						<div class="col-lg-8 pull-right">
							<span>Küsimused ja info.</span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-8 pull-right">
								<a class="btn btn-success btn-lg toggle glyphicon glyphicon-earphone pull-right" style="font-size:23px"  href="tel:56680344"data-hide-this="true">
									56811321<i class="icon-chevron-right icon-white"></i>
								</a>
								{{HTML::email('info@paevaraha.ee')}}
						</div>
					</div>

				</div>
				<div class="clearfix"></div>
			</div>
	</div>
</div>
@endif

@if(Request::path()=='/')
<div class="container well">
	
	<div class="row" hidden>

	<div class="col-lg-12" ng-controller="ItemCtrl">

		[[cost]]
		  <slider floor="25" ceiling="300" step="5" precision="2" ng-model="cost"></slider>
	</div>


	</div>
	<div class="row" > 
		<div class="col-lg-12">
@if(Auth::user())		
   <pre>Selected date is: <em>[[dt | date:'dd-MM-yyyy' ]]</em></pre>
   <pre>Selected date is: <em>[[dt2 | date:'dd-MM-yyyy' ]]</em></pre>

    <h4>Inline</h4>
   	<div class="col-lg-12">
   		<div class="row">
		      <div class="well well-sm col-lg-4" ng-model="dt">

		          <datepicker min="minDate" show-weeks="showWeeks" starting-day="1"></datepicker>
		      </div>
		      <div class="well well-sm col-lg-4 text-center" >
		      		<h3>Tagasimakse kalkulaator</h3>
		      		<div class="col-lg-12">
		      			<table class="table table-bordered">
		      				<tr>
		      					<td>Laenusumma</td>
		      					<td>Periood</td>
		      					<td>Tagasimakse</td>
		      				</tr>
		      			</table>
		      		</div>
		      </div>

		      <div class="well well-sm col-lg-4 pull-right" ng-model="dt2">

		          <datepicker min="minDate" show-weeks="showWeeks" starting-day="1"></datepicker>
		      </div>
		</div>
    </div>

   

@endif
		</div>
	</div>
	<table class="table table-bordered table-striped">
				<thead><tr><td colspan="3">Tegemist on 15 ja 30 päeva näidis summadega. </td></tr></thead>
				<tbody><tr>
					<th>Laen</th>
					<th>15päeva</th>
					<th>30päeva</th>
				</tr>
				<tr>
					<td>30 € </td>
					<td>33 € </td>
					<td>36 € </td>
				</tr>
				<tr>
					<td>50 €</td>
					<td>55 €</td>
					<td>60 €</td>
				</tr>
				<tr>
					<td>100 €</td>
					<td>110 €</td>
					<td>120 €</td>
				</tr>
				<tr>
					<td>150 €</td>
					<td>165 €</td>
					<td>180 €</td>
				</tr>
				<tr>
					<td>200 €</td>
					<td>220 €</td>
					<td>240 €</td>
				</tr>
				<tr>
					<td>250 €</td>
					<td>275 €</td>
					<td>300 €</td>
				</tr>
				<tr>
					<td>300 €</td>
					<td>330 €</td>
					<td>360 €</td>
				</tr>				
			</tbody></table>
	
</div>
<div class="container well">
	<div class="row">
		<div class="col-lg-4  col-md-4 divshadow" >
			<h3>Kuidas leping sõlmida?</h3>
			<p class="lead">
			<ol>
				 <li class=""><strong>Esmakordne laenutaotlus</strong> - <a href="{{URL::to('esmakordne-laenutaotlus')}}">Laenutaotlus</a>.</li>
				<li class="" ><strong>Esmakordselt isikutuvastus</strong> 
						<ul>
							<li>Läbi laenutaotleja pangakonto või</li>
							<li>Meie kontoris Pärnu mnt 139D/1, kab 118, Tallinn</li>
						</ul>
				</li>
				<li class="" ><strong>Laenulepingu allkirjastamine</strong>
					<ol>
					<li><strong>ID-kaardiga.</strong></li>
					<li> <strong>Meie kontoris</strong> Pärnu mnt 139D/1, kab 118, Tallinn</li>
					</ol>
				</li>
			</ol>						
			 </p>
			<a class="pull-right" href=""  style="display:none;"title="Tutvu võimalustega">Tutvu tingimustega täpsemalt
				<i class="icon-circle-arrow-right"></i>
			</a>
		</div>
		<div class="col-lg-4  col-md-4 divshadow" >
			<h3>Registreermine ja isikutuvastus läbitud?</h3>
			<p class="lead">
			<ol>
				<li class="" ><strong><a href="{{URL::to('iseteenindus')}}">Iseteenindus (avame peatselt)</a></strong> - Uue laenu taotlemiseks.</li>
				<li class="" ><strong>Saada email {{HTML::email('info@paevaraha.ee')}}</strong> - Uue laenu taotlemiseks.</li>
				<li class="" >Küsimuste korral <strong>{{HTML::email('info@paevaraha.ee')}}</strong> või <strong>56811321</strong>.</li>
			</ol>						
			 </p>
			<a class="pull-right" href=""  style="display:none;"title="Tutvu võimalustega">Tutvu tingimustega täpsemalt
				<i class="icon-circle-arrow-right"></i>
			</a>
		</div>

		<div class="col-lg-4 col-md-4 divshadow">
			<h3>Kui kiiresti saan vastuse?</h3>
			<p class="lead">
				<li class=""><strong>E-R 09-17.00 15 minuti</strong> jooksul peale <a href="{{URL::to('esmakordne-laenutaotlus')}}">Laenutaotluse</a> saatmist võtab teiega ühendust meie teenindaja.</li>
				<li class=""><strong>L-P 09-17.00 2 tunni</strong> jooksul peale <a href="{{URL::to('esmakordne-laenutaotlus')}}">Laenutaotluse</a> saatmist võtab teiega ühendust meie teenindaja.</li>
			</p>
			<a class="pull-right" href=""  style="display:none;"title="Tutvu võimalustega">Tutvu tingimustega täpsemalt
				<i class="icon-circle-arrow-right"></i>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-4 divshadow">
			<h3>Kui kiiresti raha laekub?</h3>
			<p class="lead">
				<li class=""><strong>Esmakordselt 15 minutit</strong> peale <a target="_blank"href="{{URL::to('storage/dokumendid/Laenulepingu%20n%C3%A4idis.pdf')}}">Laenulepingu </a> allkirjastamist.</li>
				<li class=""><strong>Kliendile 15 minutit</strong> peale taotlemist meie <a href="{{URL::to('iseteenindus')}}">Iseteeninduses</a> esitamist.</li>
			</p>	


		</div>


	</div>
</div>	
@else

<div class="container" >

	<div class="row">

				
		<section class='col-xs-8 col-sm-8 col-md-8 col-lg-12 well' style="background-color:white;" id="intro"> 
			<div class="clearfix visible-xs" style="height:160px;"></div>
			@yield('content')
		</section>


	</div>

</div>
@endif
<footer class="footer" style="border-top:1px solid #e5e5e5; background-color:#f5f5f5;margin-top:70px;padding:30px 0">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4"><b>Firmast</b>
				<p>OÜ Investhaldus</p>
				<table class="table">
					<tr>
						<td>Kontor Avatud:</td>
						<td>E-R 09-17.00</td>
					</tr>
					<tr>
						<td>Aadress:</td>
						<td>Pärnu mnt 139D/1, kab 121, Tallinn 11317</td>
					</tr>					
				</table>	
			</div>
			<div class="col-lg-3 col-md-4"><b>Panga rekvisiidid</b>
				<table class="table">
					<tr>
						<td>Swedbank</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2">IBAN: EE 352200 2210 5827 6924</td>
					</tr>
					<tr >
						<td>SEB: </td>
						<td>EE931010220228974225</td>
					
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<div class="col-lg-3 col-md-4"><b>Dokumendid</b>
				<p><a target="_blank" href="{{URL::to('storage/dokumendid/PR/Euroopa-tarbijakrediidi-standardinfo-teabeleht.pdf')}}">Euroopa tarbijakrediidi standardinfo teabeleht</a></p>
				<p><a target="_blank" href="{{URL::to('storage/dokumendid/PR/Laenuleping.pdf')}}">Laenulepingu näidis</a></p>
				<p><a target="_blank" href="{{URL::to('storage/dokumendid/PR/Üldtingimused.pdf')}}">Lepingu üldtingimused</a></p>
				<p><a target="_blank" href="{{URL::to('storage/dokumendid/PR/Kliendi-isikuandmete-töötlemise- põhimõtted.pdf')}}">OÜ Investhaldus "Päevaraha" kliendi isikuandmete töötlemise põhimõtted</a></p>

			</div>
			<div class="col-lg-3 col-md-4"><b>Kontakt</b>
				<p>{{HTML::email('info@paevaraha.ee')}}</p>
				<p>56811321</p>

			</div>
		</div>
	</div>

</footer>









<!--
<script type="text/javascript">
	CKEDITOR.replace("editor1",{
	 'font_names':'PT Sans, sans-seif',
     'contentsCss':[ '//fonts.googleapis.com/css?family=PT+Sans' ] 
	});
</script>
-->
<script>


</script>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48163580-1', 'paevaraha.ee');
  ga('send', 'pageview');

</script>
</body>
</html>
