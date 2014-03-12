<!DOCTYPE html>
<html ng-app="myApp">
<head>
<meta charset="UTF-8" >



        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Sans" />
        <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">



<link rel="stylesheet" href="assets/css/bootstrap.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    {{HTML::style('assets/css/ng-table.min.css')}}




    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    {{HTML::script('assets/js/ckeditor/ckeditor.js')}}
{{HTML::script('assets/js/bootstrap.min.js')}}
{{HTML::script('assets/js/angular.min.js')}}
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-route.js"></script>

    {{HTML::script('assets/js/checklist-model.js')}}
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/angular-moment-dev.js"></script>
    <script src="assets/js/baas.js"></script>


<style type="text/css">
.container{
	width:100% !important;
}

.main{margin-top:55px;}
table{
	width:100%;
}

</style>

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
			    <a class="navbar-brand" href="#">Baas-Paevaraha</a>
			  </div>

			  <!-- Collect the nav links, forms, and other content for toggling -->
				  <div class="collapse navbar-collapse navbar-center" id="bs-example-navbar-collapse-1">
			    <ul class="nav navbar-nav">


			  		    <li><a href="">Kreedit</a></li>
			  		    <li><a target="_blank"href="uusbaas/kuuraport">KuuRaport</a></li>
			  		    <li><a  ng-click="openTaotlus=!openTaotlus" href="#laenutaotlused">Laenutaotlused</a></li>
			    </ul>

				<A href="logout" class="btn btn-success pull-right">Logi Välja,  {{Auth::user()->eesnimi}}</a>
			  </div><!-- /.navbar-collapse -->
			
		</div>
	</nav>

	<section class="container main"   >
	    <div ng-view class="row" ng-controller="NewApplicationsController" ng-show="openTaotlus" style="margin:0px;position:absolute;z-index:99999;background-color: white;top:50px;left:0px;right:0px;bottom:0px;"></div>

		<div class="row" ng-controller="TestController">
			<div class="col-lg-2 col-md-2">
				<div class="row " style="padding-bottom:10px;"><div class="col-lg-12">@include('backend.search.index')</div></div>
				<div class="row "><div class="col-lg-12">@include('backend.clientForm.index')</div></div>
				
			</div>
			<div class="col-lg-7 col-md-7" >
				<div class="row " >
				@include('backend.loans.activeLoans')
				</div>
				<div class="row" >
				@include('backend.loans.closedLoans')
				</div>
			</div>
			<div class="col-lg-3 col-md-3">
				@include('backend.comments.index')
			</div>
		</div>
	</section>		

</body>
</html>
