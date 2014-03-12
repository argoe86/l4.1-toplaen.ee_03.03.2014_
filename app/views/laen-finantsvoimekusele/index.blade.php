@extends('layouts.new')
@section('content')

<div class="col-lg-8  col-md-4 divshadow" >
	<h3>Esimene laen vastavalt finantsvõimekusele.</h3>
	<p class="lead">
	<ol>
		 <li class=""><strong>Esmakordne laenutaotlus</strong> - <a href="{{URL::to('esmakordne-laenutaotlus')}}">Laenutaotlus</a>.</li>
		<li class="" ><strong>Pangakonto väljavõte</strong> - Meie e-postile <strong>{{HTML::email('info@paevalaen.ee')}} DDOC formaadis</strong></li>
		<li class="" ><strong>Meiepoolne analüüs</strong> - Analüüsime teie poolt saadetud konto väljavõtet.</li>
		<li class="" ><strong>Meiepoolne vastus</strong> - Vastus antakse teada kas e-post või telefoni teel.</li>
	</ol>						
	 </p>

</div>



@stop