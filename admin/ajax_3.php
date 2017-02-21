<?php

include_once('include/database.php');
$datass = array();
		
		
		if(isset($_GET['type']) || isset($_POST['type']))
	{
		if($_GET['type'] == "getinfo_cate")
		{
			
			$datax = array();
			$db = new database();
			$sql = "select Ma_the_loai from the_loai";
			$db->setQuery($sql);
			$result = $db->query();
			if($result)
			{
				$results = "success";
				$message = "query success";
				$data = $db->loadoject();
				foreach($data as $show)
				{
					$datax [] = ($show->Ma_the_loai);
				}
				$dataxx = array("result" => $results,"data" => $datax);
				print(json_encode($dataxx));
				
			}
			
		}
		if($_GET['type'] == "categoriesinfo")
		{
			$db = new database();
			$sql = "select Ma_the_loai_chi_tiet,Ten_the_loai_chi_tiet,Ma_the_loai from the_loai_chi_tiet";
			$db->setQuery($sql);
			$result = $db->query();
			if($result)
			{
				$results = "success";
				$message = "query success";
				$data = $db->loadoject();
				foreach($data as $show)
				{
					$functions  = "<div class='function_buttons'><ul>";
					$functions .= "<li class='function_edit'><a data-id='"   . $show->Ma_the_loai_chi_tiet . "' data-name='" . $show->Ten_the_loai_chi_tiet . "'><span>Edit</span></a></li>";
					$functions .= "<li class='function_delete'><a data-id='"   . $show->Ma_the_loai_chi_tiet . "' data-name='" . $show->Ten_the_loai_chi_tiet . "'><span>Delete</span></a></li>";
					$functions .= '</ul></div>';
					$datass[] = array("ten_the_loai_chi_tiet" => $show->Ten_the_loai_chi_tiet,"ma_the_loai" =>$show->Ma_the_loai,"functions" => $functions);
					
				}
				$final_data = array("result" => $results,"message" => $message, "data" => $datass);
				print(json_encode($final_data));
			}
			
			else
			{
				$result = array("result" => "error");
				$message = array("message" => "query error");
				$final_data = array("result" => $result,"message" => $message);
				print(json_encode($final_data));
				
			}
		}
		else if($_GET['type'] == "add_cate")
		{
					
					$cate_name = $_GET['cate_name'];
					$cate_mtl = $_GET['cate_mtl'];
					$dbx = new database();
					$sql = "INSERT INTO `the_loai_chi_tiet` (`Ten_the_loai_chi_tiet`, `Ma_the_loai`) VALUES ('".$cate_name.
					"', '".$cate_mtl."')";
					$dbx->setQuery($sql);
					$ketqua = $dbx->query();
					if($ketqua)
					{
						
						$result  = 'success';
						$message = 'query success';
						$data = array("result"  => $result,
									  "message" => $message);
					
					print(json_encode($data));
					}
					else
					{
						$result  = 'error';
     				$message = 'query error';
					$data = array("result"  => $result,
  								  "message" => $message);
					}
					
				
			
		}
		else if($_GET['type'] == 'delete_cate')
		{
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				$dbx = new database();
					$sql = "DELETE FROM `the_loai_chi_tiet` WHERE `the_loai_chi_tiet`.`Ma_the_loai_chi_tiet` = ".$id;
					$dbx->setQuery($sql);
					$ketqua = $dbx->query();
					if($ketqua)
					{
						
						$result  = 'success';
						$message = 'query success';
						$data = array("result"  => $result,
									  "message" => $message);
					
					print(json_encode($data));
					}
			}
			else
			{
				
				$result  = 'error';
     			$message = 'query error';
				$data = array("result"  => $result,
  							  "message" => $message);
			}
		}
		else if($_GET['type'] == "get_cate_id")
		{
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				$dbx = new database();
					$sql = "SELECT Ten_the_loai_chi_tiet,Ma_the_loai FROM `the_loai_chi_tiet` WHERE `the_loai_chi_tiet`.`Ma_the_loai_chi_tiet` = ".$id;
					$dbx->setQuery($sql);
					$ketqua = $dbx->query();
					if($ketqua)
					{
						$data_arr = array();
						$data = $dbx->loadOject();
						foreach($data as $show)
						{
							$data_arr [] = array("tentheloai" => $show->Ten_the_loai_chi_tiet, "matheloai" => $show->Ma_the_loai);
						}
						$result  = 'success';
						$message = 'query success';
						$dataxx = array("result"  => $result,
									  "message" => $message,"data" => $data_arr);
					
					print(json_encode($dataxx));
					}
			}
			else
			{
				$result  = 'error';
     			$message = 'query error';
				$data = array("result"  => $result,
  							  "message" => $message);
			}
		}
		else if($_GET['type'] == "edit_cate_id")
		{
			if(isset($_GET['id']))
			{
				//cate_name=C%C3%B4ng%20ngh%E1%BB%87%20-%20c%E1%BB%99ng%20%C4%91%E1%BB%93ng&cate_mtl=2
				$id = $_GET['id'];
				$cate_name = $_GET['cate_name'];
				$cate_mtl = $_GET['cate_mtl'];
				$dbx = new database();
					$sql = "UPDATE `the_loai_chi_tiet` SET". 
					" `Ten_the_loai_chi_tiet` = "."'".$cate_name."'".",".
					"`Ma_the_loai` = "."'".$cate_mtl."'"." ".
					"WHERE `the_loai_chi_tiet`.`Ma_the_loai_chi_tiet` = ".$id;
					$dbx->setQuery($sql);
					$ketqua = $dbx->query();
					if($ketqua)
					{
						$result  = 'success';
						$message = 'query success';
						$dataxx = array("result"  => $result,
									  "message" => $message);
					
					print(json_encode($dataxx));
					}
			}
			else
			{
				$result  = 'error';
     			$message = 'query error';
				$data = array("result"  => $result,
  							  "message" => $message);
			}
		}
			
		
	}


?>