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
$soap_server->register("phep_cong");
$soap_server->register("phep_tru");
$soap_server->register("phep_nhan");
$soap_server->register("phep_chia");
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$soap_server->service($HTTP_RAW_POST_DATA);
?>