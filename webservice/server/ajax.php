<?php 

if(isset($_GET['soa']) && isset($_GET['sob']) && isset($_GET['pheptoan']))
{
	switch($_GET['pheptoan'])
	{
		case 1 : echo $_GET['soa'] + $_GET['sob'];break;
		case 2 : echo $_GET['soa'] - $_GET['sob'];break;
		case 3 : echo $_GET['soa'] * $_GET['sob'];break;
		case 4 : if($_GET['sob'] == 0) echo "error"; else echo $_GET['soa'] / $_GET['sob'];break;
		default : echo "sai cú pháp"; 	
	}
}


?>