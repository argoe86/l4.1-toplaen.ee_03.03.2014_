<?php

error_reporting(E_ERROR);
define('PEAR_PATH', dirname(__FILE__).'/inc/'); 

//define('PEAR_PATH', '');

require_once PEAR_PATH.'SOAP/Client.php';
/**
 * XML_Unserializer
 *
 * kasutusel SOAP Serveri saadetud xml-vastuste töötlemiseks
 */
require_once PEAR_PATH.'XML/Unserializer.php';

/**
 * WSDL faili asukoht
 */
define('DD_WSDL', 'https://www.openxades.org:9443/?wsdl');	//test-DigiDocService
//define('DD_WSDL', 'https://digidocservice.sk.ee/?wsdl');	//live-DigiDocService

# DigiDocService certifcate issuer certificate file
define('DD_SERVER_CA_FILE', getcwd() . '/service_certs.crt');

/**
 * Kohapeal hoitavate failide kaust (lõppeb /-ga):
 */
define('DD_FILES', dirname(__FILE__).'/data/');
define('DATA_ROOT', dirname(__FILE__).'/data/');

/**#@+
 * Serveriga ühenduse loomiseks vajalik parameeter
 */
define('DD_PROXY_HOST', '');
define('DD_PROXY_PORT', '');
define('DD_PROXY_USER', '');
define('DD_PROXY_PASS', '');
define('DD_TIMEOUT', '9000');
/**#@-*/

/**
 * WSDL classi lokaalse faili nimi
 *
 * Selles hoitakse WSDL-i alusel genereeritud PHP classi, 
 * et ei peaks iga kord seda serverist uuesti pärima.
 * Kui WSDL faili aadressi muuta, tuleb ka see fail ära kustutada, kuna 
 * selles hoitakse ka serveri aadressi, mis pärast muutmist enam ei ühti
 * õige aadressiga!
 */
define('DD_WSDL_FILE', 'wsdl.class.php');

/**
 * Failide yleslaadimise kaust
 * vaikimisi on klass-faili kaustas paiknev kaust data/
 */
define('DD_UPLOAD_DIR', './data/');

/**
 * Vaikimis kasutatav keel
 * Võimalikud väärtused: EST / ENG / RUS
 */
define('DD_DEF_LANG', 'EST');

define('LOCAL_FILES', TRUE);	//when true, only hashcode form of digidoc container is sent to digidocservice to reduce 
								//net traffic

?>
