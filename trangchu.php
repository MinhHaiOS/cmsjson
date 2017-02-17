<?php

include_once 'includes/config.php';

if(is_numeric($_GET['view']))
{
    $view = $_GET['view'];
    switch($view)
    {
        case 1 :include_once CONFIG::base().'controller/c_trangchu.php';$show = new trangchu();$show->hien_thi_trang_chu();break;
		 case 2 :include_once CONFIG::base().'controller/c_trangchu.php';$show = new trangchu();$show->hien_thi_trang_con(1);break;
		  case 3 :include_once CONFIG::base().'controller/c_trangchu.php';$show = new trangchu();$show->hien_thi_danh_muc(1);break;
        default:include_once CONFIG::base().'controller/c_trangchu.php';$show = new trangchu();$show->hien_thi_trang_chu();break;
    }
   
    
}
else
{
	echo "error";
}


?>
