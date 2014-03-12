@extends('layouts.new')
@section('content')

<style >
		textarea{
				border:1px solid lightgrey;
					border-radius: 5px;

	}
	input {
		border:1px solid lightgrey;
	border-radius: 5px;
	height:30px;
	line-height: 20px;
	font-size:15px;
	text-indent: 10px;
		}
	input:focus{
		background-color:yellow;
		text-indent:5px; 
	}
	.laenutaotluse_saada_nupp:hover{font-weight: bold;cursor:pointer;}
	
	}
	#laenutaotluse_ankeet div div{
		float:left;
	}
	.left{width:150px;line-height: 30px;float:left;height:30p;}
	.toleft{float:left;line-height: 30px;height:30px;}
	.frowheight{height:30px;}
	div , p span{
		font-family:'PT Sans';
		font-size: 15px;
	}
	.content{padding:20px;}
	.error-container{
		border:1px solid #eed3d7;
		background-color: #f2dede;
	}

	.error{

	}
</style>
<div class='content'>
<div class="row error-container">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12">
			@foreach($errors->all() as $error)
				<div class="row error">{{$error}}</div>
			@endforeach
			</div>
			
		</div>

	</div>
</div>
<p>
	&nbsp;</p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	<span ><strong>NB! Laenu saab v&otilde;tta vaid enda nimele ning laenusumma kantakse Teie isiklikule pangaarvele!</strong></span></p>

	<div class="wpcf7" id="wpcf7-f669-p152-o1" style="padding: 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; "><div id="plaenu" style='width:30px;height:10px;'></div>
		<div style="padding: 1px 0px; margin: 0px; ">
			<strong style="font-size: 20px; font-family:'PT Sans'">NB: V&auml;ljastame laene klientidele, kes on 21-aastased v&otilde;i vanemad!</strong></div>
	<form  id='laenutaotluse_ankeet' class='Loan-Application-Form' name='ankeet'  method="post" style="padding: 0px; margin: 0px; ">
	
		<div class="frowheight"style="padding: 1px 0px; margin: 0px; " id="eesnimi">
			<div class="left" style='float:left;'>
				<label style='line-height: 0px'for="your-name">Eesnimi: *</label>
			</div>
			<div>
				<span class=" your-name" style="position: relative; "><input class=" " id="i_eesnimi" placeholder="Eesnimi" name="eesnimi" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			</div>
		</div>
		<div class="frowheight"style="padding: 1px 0px; margin: 0px; ">
			<span class='left' style='float:left;'>Perenimi: *</span>
			<span class=" your-familyname" style="position: relative;float:left; ">
				<input class=" " id="i_perenimi" placeholder="Perenimi"name="perenimi" size="40" style="float:right;padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />
			</span>
		</div >
		<div class='frowheight'style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Isikukood: *</span>
			<span class=" your-socialseccode toleft" style="position: relative; ">
				<input id='isikukoodd'  class=" " placeholder="Isikukood" name="isikukood" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />
			</span>
		</div>
		
		<div style="padding: 1px 0px; margin: 0px; display:none;">
			<span class='left'>Elukoht: Maakond *</span>
<script type="text/template" id="template-maakond">
	<select name="county" style='padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px;border:1px solid lightgrey;height:30px;font-size:20px' id="county">
	<option selected="selected" disabled value="">Valige maakond</option>
				<optgroup label="----------------"></optgroup>
			<% _.each(maakonnad, function (v, k){%>
				<option value="<%=v.maakond%>"><%=v.maakond%>maa</option>
<%})%>

			</select>
</script>		
			<span id='select-maakond'></span>
		</div>
		<div style="padding:1px 0px; margin:0px;display:none;">
		<span class="left">Elukoht: Linn / Küla:*</span>
		<script type="text/template" id='template-linnkyla'>
					<select name="linnkyla" style='padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px;border:1px solid lightgrey;height:30px;font-size:20px'id="linnkyla">
						<option selected="selected" disabled value="">Valige linn/küla</option>
						<optgroup label="----------------"></optgroup>
					<% _.each(linnkyla, function (v, k){
						%>
						<option value="<%=v.linnkyla%>"><%=v.linnkyla%> - <%=v.aadressiliik%></option>
						<%})%>

			</select>
		</script>
			<span class=" your-homeaddr" id='select-linnkyla' style="position: relative; ">
			<select style='padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px;border:1px solid lightgrey;height:30px;font-size:20px'><option></option></select>

			<!--	<input class=" " name="your-homeaddr" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />-->
		</span>
		</div>
		<div style="padding:1px 0px; margin:0px;display:none;">
		<span class="left">Elukoht: Tänav/Talu:*</span>
		<script type="text/template" id='template-tanavtalu'>
					<select name="tanavtalu" style='padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px;border:1px solid lightgrey;height:30px;font-size:20px'id="tanavtalu">
						<option selected="selected" disabled value="">Valige Tänav/Talu</option>
						<optgroup label="----------------"></optgroup>
					<% _.each(tanavtalu, function (v, k){%>
						<option value="<%=v.tanavtalu%>"><%=v.tanavtalu%></option>
						<%})%>

			</select>
		</script>
			<span class=" your-homeaddr" id='select-tanavtalu' style="position: relative; ">
			<select  style='padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px;border:1px solid lightgrey;height:30px;font-size:20px'><option ></option></select>

			<!--	<input class=" " name="your-homeaddr" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />-->
		</span>
		</div>
		<div>
<!--		<span>
				<input class=" " placeholder='Tänav, Korter'name="your-homeaddr" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />
			</span>--></div>
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Tänav - Maja - Korter *</span>
			<span class=" your-phone" style="position: relative; "><input class=" " placeholder="Tänav - Maja - Korter" name="elukoht" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
		<span style="font-family:'PT Sans';font-size:15px;">Näide: Pärnu mnt 139D/1 - 121</span>

			</div>	
	
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Telefon *</span>
			<span class=" your-phone" style="position: relative; "><input id="i_telefon" class=" " placeholder="Telefon" name="telefon" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span></div>
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Töökoht *</span>
			<span class=" your-work" style="position: relative; "><input class=" " placeholder="Töökoht"  style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text"name="tookoht"></input></span>
			<span style="font-family:'PT Sans';font-size:15px;">Näide: OÜ Investhaus Pluss</span>

			</div>

<!--		<div style="padding: 1px 0px; margin: 0px; font-weight:bold;">
			Olemasolevad kohustused * ( kohustuste puudumise kirjutage "ei" )<br />
			<span class=" your-work" style="position: relative; "><textarea class=" " cols="40" name="your-work" rows="10"></textarea></span></div>
-->
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Email&nbsp;</span>
			<span class=" your-email" style="position: relative; "><input class=" "  id="i_email" placeholder="E-Mail" name="email" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			<span style="font-family:'PT Sans';font-size:15px;">E-maili märkimisel saadame laenulepingu digiallkirjastamiseks e-mailile.</span>
			</div>

		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Laenusumma *</span>
			<span class=" your-loan" style="position: relative; "><input class=" " placeholder="Laenusumma" id="taotlus_summa" name="laenusumma" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />

			</span>
			<span><b style="color: red;font-family:'PT Sans';font-size:15px; "></b></span>
			</div>

		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Tagasimakse </span>
			<span class=" your-loan" style="position: relative; "><input class=" " placeholder="Tagasimakse summa" id="teie-laen" disabled name="tagasimakse" size="40" style="background-color:white;padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />

			</span>
			<span><b style="color: red;font-family:'PT Sans';font-size:15px; "></b></span>
			</div>

		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Palk *</span>
			<span class=" your-salary" style="position: relative; "><input class=" " placeholder="Palk"name="palk" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			<span style="font-family:'PT Sans';font-size:15px;">Neto palk, mis laekub pangakontole. Näide: 500 eurot</span>

			</div>
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Arveldusarve *</span>
			<span class=" your-account" style="position: relative; "><input class=" " name="arveldusarve" placeholder="Arveldusarve" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			<span style="font-family:'PT Sans';font-size:15px;">Näide: 221023062574</span>

			</div>
			<p><li style='color:red;'>NB: Laenutaotluse edastamisel palume saata ka kolme (3) kuu konto väljavõte info@laeninvest.ee e-postile, leiad selle võtmise juhendi <a href="konto-valjavote">Konto väljavõtte näidis</a> </li></p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	&nbsp;</p>
		<p style="padding: 1px 0px; margin: 0px; ">
		<div id="errors"></div>
			<input class="laenutaotluse_saada_nupp"  id="laenutaotluse_saada_nupp" style="padding: 0px; margin: 0px; background-color:#2ecc71;color:white;font-family:'Roboto', sans-serif;font-size:20px;padding-left:10px;padding-right:10px;"   type='submit' value="Saada" /><img alt="Sending ..." class="ajax-loader" src="http://www.laeninvest.ee/wp-content/plugins/contact-form-7/images/ajax-loader.gif" style="border: none; vertical-align: middle; margin-left: 4px; visibility: hidden; " /></p>
	</form>
</div>

V&otilde;&otilde;raste andmete ja sihilikult valeandmete esitamine on kuritegu, mille tagaj&auml;rjeks on politseijuurdluse alustamine.</strong></span><p>

</div>
@stop