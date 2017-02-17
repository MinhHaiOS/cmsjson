<?php

include_once('../library/SOAP/lib/nusoap.php');

$soap_client = new nusoap_client("http://127.0.0.1:81/demo/server/server.php");

$error = $soap_client->getError();

if($error) echo "<h2>Error</h2>";

$phepcong = $soap_client->call("phep_cong",array(1,2));
$pheptru = $soap_client->call("phep_tru",array(2,1));
$phepnhan = $soap_client->call("phep_nhan",array(2,2));
$phepchia = $soap_client->call("phep_chia",array(4,2));

if($soap_client->fault)
	{
		 echo "<h2>Fault</h2><pre>";
    	print_r($phepcong);
   		 echo "</pre>";
	}
else {
    $error = $soap_client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>Kết quả phép cộng 1 + 2 = " .  $phepcong .  "</h2>";
		echo "<h2>Kết quả phép trừ 2 - 1 =  " .  $pheptru . "</h2>";
		echo "<h2>Kết quả phép nhân  2 x 2 =  " .  $phepnhan .  "</h2>";
		echo "<h2>Kết quả phép chia  4 : 2 =  " .  $phepchia .  "</h2>";
		
    }
}

?>