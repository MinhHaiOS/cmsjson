<?php

include_once('include/database.php');
$datass = array();
		if(isset($_GET['type']) || isset($_POST['type']))
	{
		if($_GET['type'] == "userinfo")
		{
			$db = new database();
			$sql = "select Ma_tai_khoan,Ten_dang_nhap,Email,Ho_ten from quan_tri_vien";
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
					$functions .= "<li class='function_edit'><a data-id='"   . $show->Ma_tai_khoan . "' data-name='" . $show->Ten_dang_nhap . "'><span>Edit</span></a></li>";
					$functions .= "<li class='function_delete'><a data-id='"   . $show->Ma_tai_khoan . "' data-name='" . $show->Ten_dang_nhap . "'><span>Delete</span></a></li>";
					$functions .= '</ul></div>';
					$datass[] = array("Ten_dang_nhap" => $show->Ten_dang_nhap,"Email" =>$show->Email,"Ho_ten" => $show->Ho_ten,"functions" => $functions);
					
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
		else if($_GET['type'] == "add_user")
		{
					
					$user = $_GET['user'];
					$password = md5($_GET['pass']);
					$email = $_GET['email'];
					$fullname = $_GET['fullname'];
					$dbx = new database();
					$sql = "INSERT INTO `quan_tri_vien` (`Ten_dang_nhap`, `Mat_khau`, `Email`, `Ho_ten`) VALUES ('".$user.
					"', '".$password."', '".$email."', '".$fullname."')";
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
		else if($_GET['type'] == 'xoa_user')
		{
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				$dbx = new database();
					$sql = "DELETE FROM `quan_tri_vien` WHERE `quan_tri_vien`.`Ma_tai_khoan` = ".$id;
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
		else if($_GET['type'] == "get_user")
		{
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				$dbx = new database();
					$sql = "SELECT Ten_dang_nhap,Email,Ho_ten FROM `quan_tri_vien` WHERE `quan_tri_vien`.`Ma_tai_khoan` = ".$id;
					$dbx->setQuery($sql);
					$ketqua = $dbx->query();
					if($ketqua)
					{
						$data_arr = array();
						$data = $dbx->loadOject();
						foreach($data as $show)
						{
							$data_arr [] = array("tendangnhap" => $show->Ten_dang_nhap, "email" => $show->Email, "hoten" => $show->Ho_ten);
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
		else if($_GET['type'] == "edit_user")
		{
			if(isset($_GET['id']))
			{
				//user=admin&password=h4il4tr7m&email=admin%40newshq.com&fullname=Tr%E1%BA%A7n%20D%C6%B0%C6%A1ng%20Minh%20H%E1%BA%A3i
				$id = $_GET['id'];
				$tendangnhap = $_GET['user'];
				$pass = md5($_GET['password']);
				$email = $_GET['email'];
				$fullname = $_GET['fullname'];
				$dbx = new database();
					$sql = "UPDATE `quan_tri_vien` SET". 
					" `Ten_dang_nhap` = "."'".$tendangnhap."'".",".
					"`Email` = "."'".$email."'".",".
					"`Mat_khau` = "."'".$pass."'".",".
					"`Ho_ten` = "."'".$fullname."'"." ". 
					"WHERE `quan_tri_vien`.`Ma_tai_khoan` = ".$id;
					//echo $sql;
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