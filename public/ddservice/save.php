<?php
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
 * DigiDoc näidirakendus. Siin failis on funktsioonid erinevate moodulite
 * salvestamiseks.
 * 
 * @package		DigiDoc
 * @version		1.0.0
 * @author		Roomet Kirotarp <Roomet.Kirotarp@hot.ee>
 */

/**
 * Haagime külge DigiDoc classi
 */
 
require_once 'conf.php';
require_once 'DigiDoc.class.php';
Base_DigiDoc::load_WSDL();
$dd = new Base_DigiDoc();
session_start();

$action = isset($_REQUEST['act'])?$_REQUEST['act']:'';
$subact = isset($_REQUEST['subact'])?$_REQUEST['subact']:'';

switch( $action.'_'.$subact ){
####################################################################################################
	case 'save_ddoc':
		
		$ret=$dd->WSDL->GetSignedDoc(intval($_SESSION['scode']));

		if(!PEAR::isError($ret)){
			
			$ret_info = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
			$SignedDocInfo = $ret_info['SignedDocInfo'];
			
			//2010.07, Ahto, bdoc toe lisamine
			if (strtolower($SignedDocInfo->Format) == "bdoc")
			{
				File :: SaveAs($_SESSION['ddoc_name'], base64_decode($ret['SignedDocData']), 'application/force-download');
			}
			else
			{
				$ddoc = new Parser_DigiDoc( $ret['SignedDocData'] );
				#File::VarDump(htmlentities($dd->WSDL->xml));
				$ddcontent = ($ddoc->getDigiDoc());
				File::SaveAs($_SESSION['ddoc_name'], $ddcontent, 'application/force-download');
			}
		} else {
			echo "PEAR Error: ".htmlentities($ret->getMessage()) . "<br>\n";
		} //else
		break;
####################################################################################################
	case 'save_file':
		$ret = $dd->WSDL->getDataFile(intval($_SESSION['scode']),$_REQUEST['id']);
		if(PEAR::isError($ret)){
			echo "PEAR Error: " . htmlentities($ret->getMessage()) . "<br>\n";
		} else {
			$dfile = Parser_DigiDoc::Parse($dd->WSDL->xml, 'body');
			$dfile = $dfile['DataFileData'];
			
			//2010.07, Ahto, bdoc toe lisamine
			$ret_info = $dd->WSDL->GetSignedDocInfo(intval($_SESSION['scode']));
			$SignedDocInfo = $ret_info['SignedDocInfo'];
			
			if(LOCAL_FILES && $SignedDocInfo->Format == "DIGIDOC-XML"){
				$cont = File::readLocalFile( DD_FILES.session_id().'_'.$dfile['Id']);
				$c = Parser_DigiDoc::Parse($cont);
				$c = base64_decode($c);
				File::SaveAs($dfile['Filename'], $c, 'application/octet-stream');
			} else {
				File::SaveAs($dfile['Filename'], base64_decode($dfile['DfData']), 'application/octet-stream');
			} //else
		} //else
		break;
####################################################################################################
	case 'save_cert':
		$ret = $dd->WSDL->getSignersCertificate(intval($_SESSION['scode']),$_REQUEST['id']);
		if(PEAR::isError($ret)){
			echo "PEAR Error: " . htmlentities($result->getMessage()) . "<br>\n";
		} else {
			$cert = "-----BEGIN CERTIFICATE-----\n".$ret['CertificateData']."\n-----END CERTIFICATE-----\n";
			File::SaveAs($_REQUEST['id'].'_signer_'.date('Y-m-d').'.cer', $cert, 'application/octet-stream');
		}
		break;
####################################################################################################
	case 'save_notCert':
		$ret = $dd->WSDL->getNotarysCertificate(intval($_SESSION['scode']),$_REQUEST['id']);
		if(PEAR::isError($ret)){
			echo "PEAR Error: " . htmlentities($result->getMessage()) . "<br>\n";
		} else {
			$cert = "-----BEGIN CERTIFICATE-----\n" . $ret['CertificateData'] . "\n-----END CERTIFICATE-----\n";
			File::SaveAs($_REQUEST['id'].'_notary_'.date('Y-m-d').'.cer', $cert, 'application/octet-stream');
		}
		break;
####################################################################################################
	case 'save_notary':
		$ret = $dd->WSDL->getSignersCertificate(intval($_SESSION['scode']),$_REQUEST['id']);
		if(PEAR::isError($ret)){
			echo "PEAR Error: " . htmlentities($result->getMessage()) . "<br>\n";
		} else {
			$cert = base64_decode($ret['CertificateData']);
			File::SaveAs($_REQUEST['id'].'_notary_'.date('Y-m-d').'.ocsp', $cert, 'application/octet-stream');
		}
		break;
} //switch

?>
