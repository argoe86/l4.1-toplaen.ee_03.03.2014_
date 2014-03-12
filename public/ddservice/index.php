<?php

header('Content-Type: text/html; charset=utf-8');
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Roomet Kirotarp <Roomet.Kirotarp@hot.ee>                    |
// +----------------------------------------------------------------------+
//
/**
 * Näidisrakendus DigiDoc classile
 *
 * DigiDoc näidirakendus. Näidisrakendus on tehtud kasutades vahetult WSDL
 * funktsioone ja kõik andmefailid hoitakse kohalikus serveris. DigiDoc 
 * serverisse saadetakse vaid vastavate failide HASH koodid.
 * 
 * @package		DigiDoc
 * @version		1.0.0
 * @author		Roomet Kirotarp <Roomet.Kirotarp@hot.ee>
 */

#set_time_limit(900);


/**
 * Tegevuse valik
 * @var       string         $action
 * @access    public
 */
$action = isset($_REQUEST['act'])?$_REQUEST['act']:'';
/**
 * Alamtegevuse valik
 * @var       string         $action
 * @access    public
 */
$subact = isset($_REQUEST['subact'])?$_REQUEST['subact']:'';

/**
 * Laadime DigiDoc classi.
 */
require_once 'conf.php';
require_once 'DigiDoc.class.php';

session_start();
/**
 * Initsialiseerime uue DigiDoc objekti
 */

Base_DigiDoc::load_WSDL();
$dd = new Base_DigiDoc();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>DigiDoc System</title>
	<meta name="Author" content="Roomet Kirotarp <Roomet.Kirotarp@hot.ee>">
	<meta name="Keywords" content="DigiDoc, ddoc, digital signature">
	<meta name="Description" content="DigiDoc client">
	<link rel="stylesheet" href="gfx/dd.css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
        <script type="text/javascript" src="idCard.js"></script>
        <script type="text/javascript">
	
		function loadPlugin(){
			try
			{
				loadSigningPlugin('est');
			}
			catch (ex)
			{
				if (ex instanceof IdCardException) {
					document.getElementById('error').innerHTML = '[Veakood: ' + ex.returnCode + '; Viga: ' + ex.message + ']';
				} else {
					document.getElementById('error').innerHTML = ex.message != undefined ? ex.message : ex;
				} 
			}
		}

		function getCert() {
		    try {
				var selectedCertificate = new IdCardPluginHandler('est').getCertificate();
				document.getElementById('signCertHex').value = selectedCertificate.cert;
				document.getElementById('signCertId').value = selectedCertificate.id;

				/*
				alert("certHex: " + selectedCertificate.cert);
				alert("certId: " + selectedCertificate.id);
				*/

				document.all.xmlsrc.submit();
			} catch(ex) {
				if (ex instanceof IdCardException) {
					document.getElementById('error').innerHTML = '[Veakood: ' + ex.returnCode + '; Viga: ' + ex.message + ']';
				} else {
					document.getElementById('error').innerHTML = ex.message != undefined ? ex.message : ex;
				}  
			}
		}

		function doSign()
		{
			try {
				document.getElementById('signValueHex').value = new IdCardPluginHandler('est').sign(document.getElementById('signCertId').value, document.getElementById('hashHex').value);
				document.all.xmlsrc.submit();
		    } catch(ex) {
				if (ex instanceof IdCardException) {
					document.getElementById('error').innerHTML = '[Veakood: ' + ex.returnCode + '; Viga: ' + ex.message + ']';
				} else {
					document.getElementById('error').innerHTML = ex.message != undefined ? ex.message : ex;
				}  
		    }
		}

        </script>
	
<?php
/**
 * Päise koodide lisamine allkirjastamisel
 */
$step = isset($_REQUEST['sign'])?$_REQUEST['sign']:'PREPARE';
?>
</head>

<?php

if ($action.'_'.$subact == 'add_sign' && $_REQUEST['sign']!='END')
{
	echo '<body onLoad="loadPlugin()">';
}
else
{
	echo '<body>';
}

?>

<div id="pluginLocation"></div>
<div id="error" style="color:red;"></div>

<!-- ========== HEADER ========== -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td colspan="2" class="blackBG"><img src="gfx/0.gif" width="1" height="1" border="0" alt=""></td>
</tr>
<tr> 
	<td width="195" class="headerTxt">
		<a href="http://www.sk.ee"><img src="gfx/sklogo.GIF" border="0" width="58" height="57" alt="Sertifitseerimiskeskus"></a>
	</td>
	<td width="95%" align="center" class="headerTxt">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="headerTxt" align="center"><b>DigiDocService PHP Client Demo:</b>&nbsp;&nbsp;::&nbsp;&nbsp;<?php echo $_SERVER["SERVER_NAME"];?></td>
		</tr>
		<tr>
			<td class="headerTxt" align="center"><address><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></address></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="2" class="footer"><img src="gfx/0.gif" width="1" height="2" border="0" alt=""></td>
</tr>
<tr>
	<td colspan="2" class="blackBG"><img src="gfx/0.gif" width="1" height="1" border="0" alt=""></td>
</tr>
<tr>
	<td colspan="2"><img src="gfx/0.gif" width="1" height="1" border="0" alt=""></td>
</tr>
<tr>
	<td colspan="2" class="blackBG"><img src="gfx/0.gif" width="1" height="1" border="0" alt=""></td>
</tr>
<tr>
	<td colspan="2"><img src="gfx/0.gif" width="1" height="10" border="0" alt=""></td>
</tr>
</table>
<!-- ========== /HEADER ========== -->
<?php

switch($action.'_'.$subact){
####################################################################################################
	case 'start_ddoc': # ALUSTAMINE DigiDoc faili saatmisega <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<=

		# Loeme saadetud faili
		$file = File::getUploadedFile('ddoc');

		//2010.07, Ahto, Bdoc toe lisamine
		if (preg_match("'\.bdoc$'i", $file['name']))
		{
			$ret = $dd->WSDL->startSession('', base64_encode($file['content']), TRUE, '');
		}
		else	//eeldame, et tuli .ddoc laiendiga
		{
			# laadime sisu digidoc parserisse
			$ddoc = new Parser_DigiDoc($file['content']);
			# alustame sessiooni, saates parsitud digidoci
			
			/*
			echo "<pre>";
			echo htmlentities($ddoc->getDigiDoc(LOCAL_FILES));
			exit;
			*/
			
			//file_put_contents('/var/www/html/ddservice/data/templiga_allkiri_htmlescaped.ddoc', htmlspecialchars($ddoc->getDigiDoc(LOCAL_FILES)));
			 			
			$ret = $dd->WSDL->startSession("", $ddoc->getDigiDoc(LOCAL_FILES), TRUE, '');
		}

		if(!PEAR::isError($ret)){ # kui operatsioon oli edukas
			$xml = Parser_DigiDoc::Parse($dd->WSDL->xml, 'body');
			
			//print_r($xml);
			# salvestame saadud sessiooni koodi PHP sessiooni
			$_SESSION['scode'] = $xml['Sesscode'];
			$_SESSION['ddoc_name'] = $file['name'];
			############ HTML ######################################################################
			echo ddocHTML();
		} else {
			message("ERROR:--- " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
			echo back(TRUE);
		} //else
		break;
####################################################################################################
	case 'start_file': # ALUSTAMINE faili saatmisega <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<=
		# Loeme saadetud faili
		$file = File::getUploadedFile('file');
		unset($f);

		$ddoc = new Parser_DigiDoc();

		if(LOCAL_FILES){
			$f = $ddoc->getFileHash($file, 'D0');
		} else {
			$f['Filename'] = $file['name'];
			$f['MimeType'] = $file['MIME'];
			$f['ContentType'] = 'EMBEDDED_BASE64';
			$f['Size'] = $file['size'];
			$f['DfData'] = chunk_split(base64_encode($file['content']), 64, "\n");
		} //else

		# alustame sessiooni, saates parsitud digidoci
		$ret = $dd->WSDL->startSession('','', TRUE, $f);

		if(!PEAR::isError($ret)){ # kui operatsioon oli edukas
			session_unset(); # kustutame k6ik vanad sessiooni andmed
			$xml = $ddoc->Parse($dd->WSDL->xml, 'body');
			# salvestame saadud sessiooni koodi PHP sessiooni
			$_SESSION['scode'] = $xml['Sesscode'];
			$_SESSION['ddoc_name'] = preg_replace("'[^\.]+$'", "", $file['name'])."ddoc";
			############ HTML ######################################################################
			echo ddocHTML();
		} else {
			print_r($ret->getFault());
			print("<HR>");
			//print_r($ret);
			message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
			echo back(TRUE);
		} //else
		break;
####################################################################################################
	case 'start_new': # ALUSTAMINE faili saatmisega <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<=
	
		//2010.07, ahto, formaadi ja versiooniga seotud muutused
		if(trim($_REQUEST['dname'])){
			$ret = $dd->WSDL->StartSession('','', TRUE, '');
			//print_r($ret);
			if(!PEAR::isError($ret)){ # kui operatsioon oli edukas
				session_unset(); # kustutame k6ik vanad sessiooni andmed
				$_SESSION['scode'] = $ret['Sesscode'];
				
				switch ($_REQUEST['format_version'])
				{
					case "DIGIDOC-XML 1.3":
						$format = "DIGIDOC-XML";
						$version = "1.3";
						break;
					case "BDOC 1.0":
						$format = "BDOC";
						$version = "1.0";
						break;
					default:
						$format = "DIGIDOC-XML";
						$version = "1.3";
						break;
				}
				
				$ret = $dd->WSDL->CreateSignedDoc(intval($_SESSION['scode']),$format, $version);
				if(!PEAR::isError($ret)){ # kui operatsioon oli edukas
					
					//2010.07, ahto, bdoc toe lisamine
					if (preg_match("'\.bdoc$'i", $_REQUEST['dname']) || preg_match("'\.ddoc$'i", $_REQUEST['dname']))
					{
						$_SESSION['ddoc_name'] = $_REQUEST['dname'];
					}
					else
					{
						if ($format == "BDOC")
						{
							$_SESSION['ddoc_name'] = $_REQUEST['dname'] . ".bdoc";
						}
						else
						{
							$_SESSION['ddoc_name'] = $_REQUEST['dname'] . ".ddoc";
						}
					}
					//$_SESSION['ddoc_name'] = preg_match("'\.ddoc$'", $_REQUEST['dname'])?$_REQUEST['dname']:$_REQUEST['dname'].'.ddoc';
					
					echo ddocHTML();
				} else {
					message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
					echo back(TRUE);
				} //else
			} else {
				message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);;
				echo back(TRUE);
			} //else
		} else {
			message("Error: File name is missing!<br>\n", TRUE);
			echo back(TRUE);
		} //else
		break;
####################################################################################################
	case 'info_':
		echo ddocHTML();
		break;
####################################################################################################
	case 'info_ddoc':
		$ret = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
		if(PEAR::isError($ret)){
			message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
		} else {
			File::VarDump($ret);
		} //else
		echo back();
		break;
####################################################################################################
	case 'info_file': 
		$ret = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
		if(!PEAR::isError($ret)){
			$xml = Parser_DigiDoc::Parse($dd->WSDL->xml, 'body');
			$files = isset($xml['SignedDocInfo']['DataFileInfo'][0]) ? 
				$xml['SignedDocInfo']['DataFileInfo'] : 
				(isset($xml['SignedDocInfo']['DataFileInfo'])?
					array(0=>$xml['SignedDocInfo']['DataFileInfo']): 
					array() );
			while(list($k,$v)=each($files)){
				if($v['Id']==$_REQUEST['id']){
					File::VarDump($v);
				} //if
			} //while
		} else {
			message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
		} //else
		echo back();
		break;
####################################################################################################
	case 'info_sign': 
		$ret = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
		if(PEAR::isError($ret)){
			die("OK");
			echo "ERROR: " . htmlentities($ret->getMessage()) . "<br>\n";
		} else {
			$xml = Parser_DigiDoc::Parse($dd->WSDL->xml, 'body');
			$signatures = isset($xml['SignedDocInfo']['SignatureInfo'][0]) ? 
				$xml['SignedDocInfo']['SignatureInfo'] : 
				(isset($xml['SignedDocInfo']['SignatureInfo']) ?
					array(0=>$xml['SignedDocInfo']['SignatureInfo']) :
					array() );
			while(list($k,$v)=each($signatures)){
				if($v['Id']==$_REQUEST['id']){
					File::VarDump($v);
				} //if
			} //while
		}
		echo back();
		break;
####################################################################################################
	case 'delete_file':
		$ret = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
		if(PEAR::isError($ret)){
			message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
		} else {
			$xml = Parser_DigiDoc::Parse($dd->WSDL->xml, 'body');
			#Leiame digidocis olevad failida arrayna alati
			$files = isset($xml['SignedDocInfo']['DataFileInfo'][0]) ? 
				$xml['SignedDocInfo']['DataFileInfo'] : 
				(isset($xml['SignedDocInfo']['DataFileInfo'])?
					array(0=>$xml['SignedDocInfo']['DataFileInfo']): 
					array() );
		} //if
		$ret=$dd->WSDL->RemoveDataFile(intval($_SESSION['scode']),$_REQUEST['id']);
		if(!PEAR::isError($ret)){ # kui operatsioon oli edukas
			#kustutame ka füüsilise faili masinast
			while(list($k,$v) = each($files)){
				if($v['Id'] == $_REQUEST['id']){
					$fname = DD_FILES.session_id().'/'.$v['Id'];
					@unlink($fname);
				} 
			} //while
			message('The file was successfully deleted<br>');
		} else {
			message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
		} //else
		echo back();
		break;
####################################################################################################
	case 'delete_sign':
		$ret=$dd->WSDL->RemoveSignature(intval($_SESSION['scode']),$_REQUEST['id']);
		if(!PEAR::isError($ret)){ # kui operatsioon oli edukas
			message('The signature was successfully deleted<br>');
		} else {
			message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
		} //else
		echo back();
		break;
####################################################################################################
	case 'add_file':
		if(!isset($_FILES['file'])){
			//näitame upload FORMi
			echo uploadHTML();
		} else {
			//uploadime faili
			$file = File::getUploadedFile('file');
			
			//2010.07, Ahto, bdoc toe lisamine
			$ret_info = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
			$SignedDocInfo = $ret_info['SignedDocInfo'];
			
			if(LOCAL_FILES && $SignedDocInfo->Format == "DIGIDOC-XML"){
				$ddoc = new Parser_DigiDoc();
				$n = isset($_SESSION['lastfileID'])?intVal(preg_replace("'\D'","",$_SESSION['lastfileID'])):-1; $n++; 
				$f = $ddoc->getFileHash($file, 'D'.$n);
				$ret = $dd->WSDL->addDataFile(intval($_SESSION['scode']), $f['Filename'], $f['MimeType'], 'HASHCODE', $f['Size'], 'sha1', $f['DigestValue'], '' );
			} else {
				$ret = $dd->WSDL->addDataFile(intval($_SESSION['scode']),$file['name'], $file['MIME'], 'EMBEDDED_BASE64', $file['size'], '', '', chunk_split(base64_encode($file['content']),64,"\n") );
			} //else
			if(PEAR::isError($ret)){
				message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
			} else {
				message("The file was successfully sent!");
			} //else
		} //else
		echo back();
		break;
####################################################################################################
	case 'add_sign':
		
		# $step väärtus leitakse eespool, HTML päises
		switch($step){
			case 'PREPARE':
				unset($_SESSION['SignatureId']);
				unset($_SESSION['SignedInfoDigest']);
				echo '<form method="post" action="" enctype="multipart/form-data" name="xmlsrc">
				<input type="hidden" name="act" value="add">
				<input type="hidden" name="subact" value="sign">
				<input type="hidden" name="sign" value="FINALIZE">
				<input type="hidden" name="signCertHex" id="signCertHex" value="">
				<input type="hidden" name="signCertId" id="signCertId" value="">';
		
				echo '<table cellspacing="0" cellpadding="0" border="1">
				<tr>
					<th align="right">City :&nbsp;</th>
					<td><input type="text" name="City" value=""></td>
				</tr>
				<tr>
					<th align="right">State :&nbsp</th>
					<td><input type="text" name="State" value=""></td>
				</tr>
				<tr>
					<th align="right">&nbsp;Postal Code :&nbsp</th>
					<td><input type="text" name="PostalCode" value=""></td>
				</tr>
				<tr>
					<th align="right">Country :&nbsp</th>
					<td><input type="text" name="Country" value=""></td>
				</tr>
				<tr>
					<th align="right">Role :&nbsp</th>
					<td><textarea name="Role" rows="4" cols="32"></textarea></td>
				</tr>
				</table>
				<input type="button" value="Read signing certificate from ID-card" onClick="getCert()">
				</form>
				<form name="cancelfrm" action="?act=info" method="post">
					<input type="hidden" name="action" value="CANCEL">
					<input type="hidden" name="result" value="ERROR">
				</form>
				<form name="drverrfrm" action="error.html" method="post">
					<input type="hidden" name="result" value="ERROR">
				</form>';
				echo back();
				break;

			case 'FINALIZE':


/*
	HACK: Kontrollime, millal on antud sessiooni piires viimati välja kutsusutud finalize.
	Kui see on toimunud viimase 2 sekundi sees, siis eeldame et väljakutumine on teostatud topelt, ning vastuse saime juba eelneva väljakutsumise käigus. Probleem kliendi poolel, kuna teadmata põhjusel postitakse vorm teatud juhtutel mitmekordselt.
*/
				 if (isset($_SESSION['last_finalize_time'])) {
					$usePreviousValue = ( (time()-$_SESSION['last_finalize_time']) < 3);
				 } else {
					$usePreviousValue=false;				 
				 }
				 $_SESSION['last_finalize_time']=time();

				if (!$usePreviousValue) { // Kas me teema antud päringu uuesti või kasutame eelmine kord saadud vastust?
					$ret = $dd->WSDL->PrepareSignature(intval($_SESSION['scode']),$_REQUEST['signCertHex'], $_REQUEST['signCertId'], 	stripslashes($_REQUEST['Role']), stripslashes($_REQUEST['City']), stripslashes($_REQUEST['State']), stripslashes($_REQUEST['PostalCode']), stripslashes($_REQUEST['Country']),"");
					$_SESSION['last_finalize_ret']=serialize($ret);
				} else { // Kasutame päringu vastust, mis on kirjutatud sessiooni
					$ret = unserialize($_SESSION['last_finalize_ret']);
				}


				if(PEAR::isError($ret)){

					/*
					echo "<pre>";
					print_r($ret);
					*/

					message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
					echo back();
				} else {

					$_SESSION['SignatureId'] = !isset($_SESSION['SignatureId'])?$ret['SignatureId']:$_SESSION['SignatureId'];
					$_SESSION['SignedInfoDigest'] = !isset($_SESSION['SignedInfoDigest'])?$ret['SignedInfoDigest']:$_SESSION['SignedInfoDigest'];

					echo '<form method="post" action="" enctype="multipart/form-data" name="xmlsrc">
					<input type="hidden" name="action" value="FINALIZE">';

					echo '<input type="hidden" name="hashHex" id="hashHex" value="' . $_SESSION['SignedInfoDigest'] .'">';
					echo '<input type="hidden" name="signCertHex" id="signCertHex" value="'. $_REQUEST['signCertHex'] .'">';
					echo '<input type="hidden" name="signCertId" id="signCertId" value="'.$_REQUEST['signCertId'].'">';
					echo '<input type="hidden" name="signValueHex" id="signValueHex" value="">';

					echo '<input type="hidden" name="act" value="add">
					<input type="hidden" name="subact" value="sign">
					<input type="hidden" name="signatureId" value="'.$_SESSION['SignatureId'].'">
					<input type="hidden" name="signedInfoDigest" value="'.$_SESSION['SignedInfoDigest'].'">
					<input type="hidden" name="sign" value="END">
					<input type="button" value="Sign digitally" onClick="doSign()">
					</form>
					<form name="cancelfrm" action="?act=info" method="post">
						<input type="hidden" name="action" value="CANCEL">
						<input type="hidden" name="result" value="ERROR">
					</form>
					<form name="drverrfrm" action="error.html" method="post">
						<input type="hidden" name="result" value="ERROR">
					</form>';
					echo back();
				}
				break;
			case 'END':
				unset($_SESSION['SignatureId']);
				unset($_SESSION['SignedInfoDigest']);
				$ret = $dd->WSDL->FinalizeSignature(intval($_SESSION['scode']),$_REQUEST['signatureId'], $_REQUEST['signValueHex']);

				/*
				echo "<pre>";
					print_r($ret);
					exit;
					*/

				if(PEAR::isError($ret)){
					message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", TRUE);
				} else {
					message('The signature was successfully added.');
				}
				echo back();
				break;
		} //switch
		break;
####################################################################################################
	default: #Lõpetame sessiooni, kui eksisteerib ja näitame esilehe formi =========================
		if(isset($_SESSION['scode'])){
			#Kustutatme kõik failid
			$ret = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
			if(PEAR::isError($ret)){
				#echo "ERROR: " . htmlentities($ret->getMessage()) . "<br>\n";
			} else {
				$xml = Parser_DigiDoc::Parse($dd->WSDL->xml, 'body');
				#Leiame digidocis olevad failida arrayna alati
				$files = isset($xml['SignedDocInfo']['DataFileInfo'][0]) ? 
					$xml['SignedDocInfo']['DataFileInfo'] : 
					(isset($xml['SignedDocInfo']['DataFileInfo'])?
						array(0=>$xml['SignedDocInfo']['DataFileInfo']): 
						array() );
				while(list($k, $v)=each($files)){
					$fname = DD_FILES.session_id().'/'.$v['Id'];
					@unlink($fname);
				} //while
			}
			$dd->WSDL->CloseSession(intval($_SESSION['scode']));
			while(list($k,$v)=each($_SESSION)){
				unset($_SESSION[$k]);
			} //while
		}
		###### HTML ########

?>
<table border="0" cellspacing="10" cellpadding="5" width="100%">
<tr><!-- DigiDoc faili saatmise form sessiooni alustamiseks -->
	<td align="center">
		<form method="post" action="" enctype="multipart/form-data">
		<table>
		<tr>
			<td class="label">Digidoc file:&nbsp;</td>
			<td><input type="file" name="ddoc" id="ddoc"><input type="hidden" name="act" value="start"><input type="hidden" name="subact" value="ddoc"></td>
			<td><input type="submit" value="Send digidoc file"></td>
		</tr>
		</table>
		</form>
	</td>
</tr>
<tr><!-- Failiga sessioni alustamise form (mitte digidoc-failiga) -->
	<td align="center">
		<form method="post" action="" enctype="multipart/form-data">
		<table>
		<tr>
			<td class="label">File :&nbsp;</td>
			<td><input type="file" name="file" id="file"><input type="hidden" name="act" value="start"><input type="hidden" name="subact" value="file"></td>
			<td><input type="submit" value="Send file"></td>
		</tr>
		</table>
		</form>
	</td>
</tr>
<!-- Tühja digidoc faili sessiooni alustamine -->
<tr>
	<td align="center">
		<form method="post" action="" enctype="multipart/form-data">
		<table>
		<tr>
			<td class="label">Name :&nbsp;</td>
			<td><input type="text" name="dname" name="dname"><input type="hidden" name="act" value="start"><input type="hidden" name="subact" value="new"></td>
			<td><select name="format_version"><option value="DIGIDOC-XML 1.3" selected>DIGIDOC-XML 1.3</option>
			<!-- NB! 2011.02.05, Praegu ei peaks uusi konteinereid tegema BDOC formaadis, kuna formaat pole veel ametlikult
			toetatud
			-->
			<!--<option value="BDOC 1.0">BDOC 1.0</option>--></select></td>
			<td><input type="submit" value="New digidoc"></td>
		</tr>
		</table>
		</form>
	</td>
</tr>
</table>
<?php

} //switch
//////////////////////// KOODI OSA LÕPP //////////////////////////////////
?>
<!-- ========== FOOTER ========== -->
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
	<td colspan="2"><img src="gfx/0.gif" width="1" height="10" border="0"></td>
</tr>
<tr>
	<td class="footer" colspan="2"><img src="gfx/0.gif" width="1" height="4" border="0"></td>
</tr>
<tr>
	<td colspan="2" class="blackBG"><img src="gfx/0.gif" width="1" height="1" border="0" alt=""></td>
</tr>
<tr><td colspan="2" align="center"><a href="ddservice.tar.gz">Source code</a>&nbsp;(updated 15.11.2011)</td></tr>
</table>
<!-- ========== /FOOTER ========== -->
</body>
</html>
<?php

#LISA 1
#HTML-i väljastamise funktsioonid


/**
 * Digidoc info HTML
 *
 * GEnereerib infolehe vastavalt serverist saadud infole aktiivse DigiDoc 
 * faili kohta
 * @access    public
 * @return    string
 */
function ddocHTML(){
	global $dd;
//	$dd->addHeader('SessionCode', );
	$ret = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
	//print_r($ret);
	if(PEAR::isError($ret)){
		message("ERROR: " . htmlentities($ret->getMessage()) . "<br>\n", FALSE);
		echo back(TRUE);
	} else {
		$xml = Parser_DigiDoc::Parse($dd->WSDL->xml, 'body');
		#Leiame digidocis olevad failida arrayna alati
		$files = isset($xml['SignedDocInfo']['DataFileInfo'][0]) ? 
			$xml['SignedDocInfo']['DataFileInfo'] : 
			(isset($xml['SignedDocInfo']['DataFileInfo'])?
				array(0=>$xml['SignedDocInfo']['DataFileInfo']): 
				array() );
		$_SESSION['lastfileID'] = $files[count($files)-1]['Id'];
		#leaiame kõik allkirjad arrayna alati
		$signatures = isset($xml['SignedDocInfo']['SignatureInfo'][0]) ? 
			$xml['SignedDocInfo']['SignatureInfo'] : 
			(isset($xml['SignedDocInfo']['SignatureInfo']) ?
				array(0=>$xml['SignedDocInfo']['SignatureInfo']) :
				array() );
		if (count($signatures)==0)
			$_SESSION['lastsignID']=0;
		else
			$_SESSION['lastsignID'] = $signatures[count($signatures)-1]['Id'];
		############ Genereerime HTML-i ################
		$ret = '
<table cellspacing="0" cellpadding="2" border="1">
<tr>
	<th class="tabLabel">Format</th>
	<th class="tabLabel">Version</th>
	<th class="tabLabel" colspan="2">&nbsp;</th>
</tr>
<tr>
	<td class="tabLabel">'.$xml['SignedDocInfo']['Format'].'</td>
	<td class="tabValue">'.$xml['SignedDocInfo']['Version'].'</td>
	<td class="tabValue"><form method="post" action=""><input type="hidden" name="act" value="info"><input type="hidden" name="subact" value="ddoc"><input type="submit" value="i" class="nupp"></form></td>
	<td class="tabValue"><form method="post" action="save.php"><input type="hidden" name="act" value="save"><input type="hidden" name="subact" value="ddoc"><input type="submit" value="Save" class="nupp"></form></td>
</tr>
</table><br />
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td class="blHead"><strong>Files :</strong></td>
</tr>
<tr>
	<td>';
		$ret .= '
<table border="1" cellpadding="1" cellspacing="0" >
<tr>
	<th>Id</th>
	<th>Name</th>
	<th>MIME</th>
	<th>Length</th>
	<th colspan="3" align="right"><form method="post" action=""><input type="hidden" name="act" value="add" /><input type="hidden" name="subact" value="file" /><input type="hidden" name="id" value="'.count($files).'" /><input type="submit" value="+" class="nupp'.(count($signatures)?'Disabled" disabled':'"').' /></form></th>
</tr>';

		if(count($files)) { 
			while(list($k,$v)=each($files)) {
				$ret .= '
<tr>
	<td>'.$v['Id'].'</td>
	<td>'.$v['Filename'].'</td>
	<td>'.$v['MimeType'].'</td>
	<td>'.$v['Size'].'</td>
	<td><form method="post" action=""><input type="hidden" name="act" value="info" /><input type="hidden" name="subact" value="file" /><input type="hidden" name="id" value="'.$v['Id'].'" /><input type="submit" value="i" class="nupp" /></form></td>
	<td><form method="post" action="save.php"><input type="hidden" name="act" value="save" /><input type="hidden" name="subact" value="file" /><input type="hidden" name="id" value="'.$v['Id'].'" /><input type="submit" value="Save" class="nupp" /></form></td>
	<td><form method="post" action=""><input type="hidden" name="act" value="delete" /><input type="hidden" name="subact" value="file" /><input type="hidden" name="id" value="'.$v['Id'].'" /><input type="submit" value="-" class="nupp'.(count($signatures)?'Disabled" disabled':'"').' /></form></td>
</tr>';
			} # while
		} else {
			$ret .='<tr><td colspan="7"><div class="errMessage">No files</div></td></tr>';
		}
		$ret .='</table>';
		$ret.= '
	</td>
</tr>
</table><br />
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td class="blHead"><strong>Signatures :</strong></td>
</tr>
<tr>
	<td>';
	$ret .='
<table border="1" cellpadding="1" cellspacing="0" >
<tr>
	<th>Id</th>
	<th>Status</th>
	<th>Time</th>
	<th>Role</th>
	<th>Signer</th>
	<th colspan="5" align="right"><form method="post" action=""><input type="hidden" name="act" value="add" /><input type="hidden" name="subact" value="sign" /><input type="hidden" name="id" value="'.count($signatures).'" /><input type="submit" value="+" class="nupp" /></form></th>
</tr>';
		if(count($signatures)) { 
			while(list($k,$v)=each($signatures)) {
				$ret .= '
<tr>
	<td>'.$v['Id'].'</td>
	<td>'.($v['Status']=='Error'?$v['Error']['code'].'::<strong>'.$v['Error']['category'].'</strong> - '.$v['Error']['description']:$v['Status']).'</td>
	<td>'.$v['SigningTime'].'</td>
	<td>'.(isset($v['SignerRole']['Role'])?$v['SignerRole']['Role']:'&nbsp;').'</td>
	<td>'.$v['Signer']['CommonName'].'</td>
	<td><form method="post" action=""><input type="hidden" name="act" value="info" /><input type="hidden" name="subact" value="sign" /><input type="hidden" name="id" value="'.$v['Id'].'" /><input type="submit" value="i" class="nupp" /></form></td>
	<td><form method="post" action="save.php"><input type="hidden" name="act" value="save" /><input type="hidden" name="subact" value="cert" /><input type="hidden" name="id" value="'.$v['Id'].'" /><input type="submit" value="Signer Cert" class="nupp" /></form></td>
	<td><form method="post" action="save.php"><input type="hidden" name="act" value="save" /><input type="hidden" name="subact" value="notCert" /><input type="hidden" name="id" value="'.$v['Id'].'" /><input type="submit" value="OCSP Responder Cert" class="nupp" /></form></td>
	<td><form method="post" action="save.php"><input type="hidden" name="act" value="save" /><input type="hidden" name="subact" value="notary" /><input type="hidden" name="id" value="'.$v['Id'].'" /><input type="submit" value="OCSP Response" class="nupp" /></form></td>
	<td><form method="post" action=""><input type="hidden" name="act" value="delete" /><input type="hidden" name="subact" value="sign" /><input type="hidden" name="id" value="'.$v['Id'].'" /><input type="submit" value="-" class="nupp" /></form></td>
</tr>';
		} # while
		} else {
			$ret .= '<tr><td colspan="10"><div class="errMessage">No signatures</div></td></tr>';
		}
		$ret .='</table>';
		$ret .='
	</td>
</tr>
</table>';
		return $ret.'<br />'.back(TRUE);
	}
} // end func


/**
 * Tagasi nupp.
 *
 * Genereerib tagasi esilehele nupu. Kui parameeter on TRUE, siis 
 * tekitatakse nupp, mis lõpetab sessiooni ja viib tagasi DigiDoc
 * faili loomise lehele.
 * @param     boolean        $logout
 * @access    public
 * @return    string
 */
function back( $logout = FALSE){
    return '<form method="post" action="">'.($logout?'':'<input type="hidden" name="act" value="info" />').'<input type="submit" value="&laquo; '.($logout?'New file':'Back').'" class="nupp" /></form>';
} // end func

/**
 * Failide laadimise form.
 *
 * Tekitab formi faili üleslaadimiseks.
 * @access    public
 * @return    string
 */
function uploadHTML(){
	return '
	<table cellspacing="0" cellpadding="0" border="1">
	<tr>
		<th>Add file :</th>
	</tr>
	<tr>
		<td>
			<form method="post" action="" enctype="multipart/form-data">
			<input type="hidden" name="act" value="add">
			<input type="hidden" name="subact" value="file">
			<input type="file" name="file" value="">&nbsp;<input type="submit" value="Send" class="nupp">
			</form>
		</td>
	</tr>
	</table>
	';
} // end func

/**
 * Teate väljastamise funktsioon.
 *
 * Väljastab formaaditud teate. Kui $err väärtus on TRUE on teate
 * CSS koodiks "errmsg", FALSE korral "msg"
 * gfx/dd.css failis saab siis vajaliku kujunduse erinevatele teadetele
 * paika juba panna vastavalt oma soovidele.
 * @param     string         $msg
 * @param     boolean        $err
 * @access    public
 */
function message( $msg, $err = FALSE ){
	echo '<div class="'.($err?'err':'').'msg">'.$msg.'</div>';
} // end func
?>
