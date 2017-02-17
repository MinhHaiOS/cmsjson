<?php

include_once('../library/SOAP/lib/nusoap.php');

function phep_cong($a,$b)
{
	return $a + $b;
}

function phep_tru($a,$b)
{
	return $a - $b;	
}

function phep_nhan($a,$b)
{
	return $a * $b;	
}

function phep_chia($a,$b)
{
	if($b == 0) return false;
	else return $a / $b;	
}

$soap_server = new soap_server();
$soap_server->configureWSDL("Thực hiện các phép toán", "urn:thuchienpheptoan");
$soap_server->register("phep_cong",array("a" => "xsd:interger","b" => "xsd:integer"),
    array("return" => "xsd:integer"),
    "urn:thuchienpheptoan",
    "urn:thuchienpheptoan#phep_cong",
    "rpc",
    "encoded",
    "Thực hiện phép cộng cho 2 số");

/* ------------------------------------------------ */
$soap_server->register("phep_tru",array("a" => "xsd:interger","b" => "xsd:integer"),
    array("return" => "xsd:integer"),
    "urn:thuchienpheptoan",
    "urn:thuchienpheptoan#phep_tru",
    "rpc",
    "encoded",
    "Thực hiện phép trừ cho 2 số");
	
/* ------------------------------------------------ */

$soap_server->register("phep_nhan",array("a" => "xsd:interger","b" => "xsd:integer"),
    array("return" => "xsd:integer"),
    "urn:thuchienpheptoan",
    "urn:thuchienpheptoan#phep_nhan",
    "rpc",
    "encoded",
    "Thực hiện phép nhân cho 2 số");
	
/* ------------------------------------------------- */
$soap_server->register("phep_chia",array("a" => "xsd:decimal","b" => "xsd:decimal"),
    array("return" => "xsd:decimal"),
    "urn:thuchienpheptoan",
    "urn:thuchienpheptoan#phep_chia",
    "rpc",
    "encoded",
    "Thực hiện phép chia cho 2 số");
	
/* ------------------------------------------------- */	

if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$soap_server->service($HTTP_RAW_POST_DATA);
?>