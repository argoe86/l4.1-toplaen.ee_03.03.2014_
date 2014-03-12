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

</style>
<div class='content'>
<p>
	&nbsp;</p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	<span >NB! Kредит можно взять только на свое имя и cумму займа переведут на Ваш личный счет!</span></p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	<span >В первый раз, вы можете подать заявку на кредит по телефону, интернету или по почте.</span></p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	<span >При первой заявке Вы можете можете дать свои данные по телефонному номеру 56680344 или 56958509 .</span></p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	&nbsp;</p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	<span >После того как Вы предоставили нам Ваши данные, будет проходит процесс проверки (Вы не числитесь в регистре не платёжеспособных лиц и против Вас нет требований от судебных исполнителей) в течение одного (1) рабочего дня в конторе OÜ Investhaus Pluss. В этот же день с Вами свяжутся и Вам будет дан ответ по поводу займа. Получив от нас положительный ответ, с Вами договорятся о встрече (по телефону или по электронной почте) о подписании договора о займе. Встреча требуется в случае того, если у Вас не имеется возможности подписать договор о займе дигитально с помощью ИД-карты.<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	<span При встрече с нами у Вас должен быть в наличии документ удостоверения личности (ИД-карта, паспорт, водительские права) и номер расчётного счёта, куда будет перечислена сумма займа. Подписав договор о займе / договор клиента, Вы получите свой личный номер клиента, при помощи которого Вы сможете в будущем ходатайствовать о новый займах в ускоренном порядке.</span></p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	&nbsp;</p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; ">
	<span >Договоры о займе заключаем и суммы займа выплачиваем клиентам не моложе 21-го года.</span></p>
<div style='text-transform:capitalize;' class="wpcf7" id="wpcf7-f669-p152-o1" style="padding: 0px; margin: 0px; color: rgb(62, 62, 62); font-family: 'PT Sans', sans-serif; font-size: 15px; line-height: 30px; "><div id="plaenu" style='width:30px;height:10px;'></div>

	<form  id='laenutaotluse_ankeet' class='Loan-Application-Form' name='ankeet' action='send.php' method="post" style="padding: 0px; margin: 0px; ">
	
		<div class="frowheight"style="padding: 1px 0px; margin: 0px; " id="eesnimi">
			<div class="left" style='float:left;'>
				<label style='line-height: 30px'for="your-name">имя: *</label>
			</div>
			<div>
				<span class=" your-name" style="position: relative; "><input class=" " placeholder="Eesnimi" name="your-name" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			</div>
		</div>
		<div class="frowheight"style="padding: 1px 0px; margin: 0px; ">
			<span class='left' style='float:left;'>фамилия: *</span>
			<span class=" your-familyname" style="position: relative;float:left; ">
				<input class=" " placeholder="Perenimi"name="your-familyname" size="40" style="float:right;padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />
			</span>
		</div >
		<div class='frowheight'style="padding: 1px 0px; margin: 0px; ">
			<span class="left">личный код : *</span>
			<span class=" your-socialseccode toleft" style="position: relative; ">
				<input id='isikukoodd'  class=" " placeholder="Isikukood" name="your-socialseccode" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" />
			</span>
		</div>
		
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class='left'>адрес: уезд *</span>
<script type="text/template" id="template-maakond">
	<select name="county" style='padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px;border:1px solid lightgrey;height:30px;font-size:20px'id="county">
	<option selected="selected" disabled value="">выберите уезд</option>
				<optgroup label="----------------"></optgroup>
			<% _.each(maakonnad, function (v, k){%>
				<option value="<%=v.maakond%>"><%=v.maakond%>maa</option>
<%})%>

			</select>
</script>		
			<span id='select-maakond'></span>
		</div>
		<div style="padding:1px 0px; margin:0px;">
		<span class="left">адрес: город / деревня:*</span>
		<script type="text/template" id='template-linnkyla'>
					<select name="linnkyla" style='padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px;border:1px solid lightgrey;height:30px;font-size:20px'id="linnkyla">
						<option selected="selected" disabled value="">выберите город / деревня</option>
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
						<option selected="selected" disabled value="">выберите улица / ферма</option>
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
			<span class="left">Улица-Дом-Квартира*</span>
			<span class=" your-phone" style="position: relative; "><input class=" " placeholder="Tänav - Maja - Korter" name="tanavtalu" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
		<span style="font-family:'PT Sans';font-size:15px;">Näide: Pärnu mnt 139D/1 - 121</span>
			</div>	
		<div style="padding: 1px 0px; margin: 0px;display:none; ">
			<span class="left">Korteri number *</span>
			<span class=" your-phone" style="position: relative; "><input class=" " placeholder="Maja number" name="your-housenumber" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span></div>	

		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Telefon *</span>
			<span class=" your-phone" style="position: relative; "><input class=" " placeholder="Telefon" name="your-phone" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span></div>
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Работа *</span>
			<span class=" your-work" style="position: relative; "><input class=" " placeholder="Töökoht"  style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text"name="your-work"></input></span>
			<span style="font-family:'PT Sans';font-size:15px;">Näide: OÜ Investhaus Pluss</span>

			</div>

<!--		<div style="padding: 1px 0px; margin: 0px; font-weight:bold;">
			Olemasolevad kohustused * ( kohustuste puudumise kirjutage "ei" )<br />
			<span class=" your-work" style="position: relative; "><textarea class=" " cols="40" name="your-work" rows="10"></textarea></span></div>
-->
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Email&nbsp;</span>
			<span class=" your-email" style="position: relative; "><input class=" " placeholder="E-Mail" name="your-email" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			<span style="font-family:'PT Sans';font-size:15px;">E-maili märkimisel saadame laenulepingu digiallkirjastamiseks e-mailile.</span>
			</div>
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Laenusumma *</span>
			<span class=" your-loan" style="position: relative; "><input class=" " placeholder="Laenusumma" name="your-loan" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			<span><b style="color: red;font-family:'PT Sans';font-size:15px; ">NB: esmakordsel taotlemisel kuni 150&euro;</b></span>
			</div>
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Palk *</span>
			<span class=" your-salary" style="position: relative; "><input class=" " placeholder="Palk"name="your-salary" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			<span style="font-family:'PT Sans';font-size:15px;">Neto palk, mis laekub pangakontole. Näide: 300 eurot</span>

			</div>
		<div style="padding: 1px 0px; margin: 0px; ">
			<span class="left">Arveldusarve *</span>
			<span class=" your-account" style="position: relative; "><input class=" " name="your-account" placeholder="Arveldusarve" size="40" style="padding-top: 0px; padding-bottom: 0px; margin: 0px; width: 300px; " type="text" value="" /></span>
			<span style="font-family:'PT Sans';font-size:15px;">Näide: 221023062574</span>

			</div>
		<p style="padding: 1px 0px; margin: 0px; ">
		<div id="errors"></div>
			<input class="laenutaotluse_saada_nupp"  id="laenutaotluse_saada_nupp" style="padding: 0px; margin: 0px; background-color:#2ecc71;color:white;font-family:'Roboto', sans-serif;font-size:20px;padding-left:10px;padding-right:10px;"  name='saada_laenutaotlus' type='button' value="Saada" /><img alt="Sending ..." class="ajax-loader" src="http://www.laeninvest.ee/wp-content/plugins/contact-form-7/images/ajax-loader.gif" style="border: none; vertical-align: middle; margin-left: 4px; visibility: hidden; " /></p>
	</form>
</div>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: Arial, sans-serif; font-size: 11.111111640930176px; line-height: 18.88888931274414px; ">
	<span >Esmakordne Laenu taotlemine&nbsp;<strong> posti teel </strong>. Peale eeloleva taotluse t&auml;itmist ,saadame teile eelt&auml;idetud Kliendilepingu posti teel mis on vaja&nbsp;</span><span >allkirjastatada ning lisada koopia iskutt&otilde;endavast dokumendist (IDkaart v&otilde;i EV&nbsp;pass) &nbsp;ja saata posti teel aadressil&nbsp;O&Uuml; Investhaus Pluss, Kirde 14, 11623 Tallinn.</span></p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: Arial, sans-serif; font-size: 11.111111640930176px; line-height: 18.88888931274414px; ">
	&nbsp;</p>

<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: Arial, sans-serif; font-size: 11.111111640930176px; line-height: 18.88888931274414px; ">
	<span >Kiireim moodus laenu saamiseks on see , kui olete meie laenuvormi t&auml;itnud , siis edastame teile eelt&auml;idetud Kliendilepingu mille saate digiallkirjastada ja meile tagasi saata!</span></p>
<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: Arial, sans-serif; font-size: 11.111111640930176px; line-height: 18.88888931274414px; ">
	&nbsp;</p>

<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: Arial, sans-serif; font-size: 11.111111640930176px; line-height: 18.88888931274414px; ">
	<span >Laenulepingu tingimustega ja krediidikulukusem&auml;&auml;raga saate ka tutvuda meie,&nbsp;O&Uuml; Investhaus Pluss &nbsp;kodulehel:&nbsp;</span><a href="http://www.laeninvest.ee/Docs/Laenuleping.pdf" style="padding: 0px; margin: 0px; color: rgb(39, 112, 18); " title="Leping"><span >LEPING</span></a><span >&nbsp;lingi all.&nbsp;</span><span >Kui tekib k&uuml;simusi, siis selgitab meie t&ouml;&ouml;taja lepingu tingimusi teile kokkusaamisel enne lepingu allkirjastamist.
<p>
	<strong></span></strong></p>


<p style="padding: 1px 0px; margin: 0px; color: rgb(62, 62, 62); font-family: Arial, sans-serif; font-size: 11.111111640930176px; line-height: 18.88888931274414px; ">
<span ><strong>
V&otilde;&otilde;raste andmete ja sihilikult valeandmete esitamine on kuritegu, mille tagaj&auml;rjeks on politseijuurdluse alustamine.</strong></span><p>

</div>

@stop