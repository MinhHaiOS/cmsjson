<?php

include_once('include/database.php');
$datass = array();
if(isset($_GET['type']))
{
	if($_GET['type'] == "userinfo")
	{
		$db = new database();
		$sql = "select Ma_tai_khoan,Ten_dang_nhap,Email,Ho_ten from quan_tri_vien";
		$db->setQuery($sql);
		$result = $db->query();
		if($result)
		{
			$results = array("result" => "success");
			$message = array("message" => "query success");
			$data = $db->loadoject();
			foreach($data as $show)
			{
				$functions  = '<div class="function_buttons"><ul>';
				$functions .= '<li class="function_edit"><a data-id="'   . $show->Ma_tai_khoan . '" data-name="' . $show->Ten_dang_nhap . '"><span>Edit</span></a></li>';
				$functions .= '<li class="function_delete"><a data-id="' . $show->Ma_tai_khoan . '" data-name="' . $show->Ten_dang_nhap . '"><span>Delete</span></a></li>';
				$functions .= '</ul></div>';
				$datass[] = array("result" => "success","message" => "query success","data" => array("Ten_dang_nhap" => $show->Ten_dang_nhap,"Email" =>$show->Email,"Ho_ten" => $show->Ho_ten,"function" => $functions));
				
			}
			echo "<pre>";
			print_r(json_encode($datass));
			echo "<pre>";
		}
		else
		{
			$result = array("result" => "error");
		}
	}
}

?>