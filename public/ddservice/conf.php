<?php

error_reporting(E_ERROR);
define('PEAR_PATH', dirname(__FILE__).'/inc/'); 

//define('PEAR_PATH', '');

require_once PEAR_PATH.'SOAP/Client.php';
/**
 * XML_Unserializer
 *
 * kasutusel SOAP Serveri saadetud xml-vastuste t��tlemiseks
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
 * Kohapeal hoitavate failide kaust (l�ppeb /-ga):
 */
define('DD_FILES', dirname(__FILE__).'/data/');
define('DATA_ROOT', dirname(__FILE__).'/data/');

/**#@+
 * Serveriga �henduse loomiseks vajalik parameeter
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
 * et ei peaks iga kord seda serverist uuesti p�rima.
 * Kui WSDL faili aadressi muuta, tuleb ka see fail �ra kustutada, kuna 
 * selles hoitakse ka serveri aadressi, mis p�rast muutmist enam ei �hti
 * �ige aadressiga!
 */
define('DD_WSDL_FILE', 'wsdl.class.php');

/**
 * Failide yleslaadimise kaust
 * vaikimisi on klass-faili kaustas paiknev kaust data/
 */
define('DD_UPLOAD_DIR', './data/');

/**
 * Vaikimis kasutatav keel
 * V�imalikud v��rtused: EST / ENG / RUS
 */
define('DD_DEF_LANG', 'EST');

define('LOCAL_FILES', TRUE);	//when true, only hashcode form of digidoc container is sent to digidocservice to reduce 
								//net traffic

?>
