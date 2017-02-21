<?php

include_once('include/database.php');
$datass = array();
		if(isset($_GET['type']) || isset($_POST['type']))
	{
		if($_GET['type'] == "getinfo")
		{
			$datax = array();
			$data_tk = array();
			$data_tentk = array();
			$data_mtl = array();
			$db = new database();
			$sql = "select Ma_tai_khoan,Ten_dang_nhap from quan_tri_vien";
			$db->setQuery($sql);
			$result = $db->query();
			if($result)
			{
				$result_text = "success";
				$data = $db->loadOject();
				foreach($data as $show)
				{
					$data_tk []= ($show->Ma_tai_khoan);
					$data_tentk [] = ($show->Ten_dang_nhap);
				}
				$sql_2 = "select Ma_the_loai_chi_tiet from the_loai_chi_tiet";
				$db->setQuery($sql_2);
				$result2 = $db->query();
				if($result2)
				{
					$data = $db->loadOject();
					foreach($data as $show)
					{
						$data_mtl [] = ($show->Ma_the_loai_chi_tiet);
					}
				}
				$datax = array("result" => $result_text,"mtk" => $data_tk,"mtl" => $data_mtl);
				print(json_encode($datax));
					
			}
			
		}
		else if($_GET['type'] == "newsinfo")
		{
			$db = new database();
			$sql = "select Ma_tin_tuc,Ten_tin_tuc,Noi_dung_chi_tiet,Noi_dung_tom_gon,Thoi_gian_dang,Ma_tai_khoan,Ma_the_loai_chi_tiet,SL_nguoi_doc from tin_tuc";
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
					$functions .= "<li class='function_edit'><a data-id='"   . $show->Ma_tin_tuc . "' data-name='" . $show->Ten_tin_tuc . "'><span>Edit</span></a></li>";
					$functions .= "<li class='function_delete'><a data-id='"   . $show->Ma_tin_tuc . "' data-name='" . $show->Ten_tin_tuc . "'><span>Delete</span></a></li>";
					$functions .= '</ul></div>';
					$datass[] = array("ten_tin_tuc"=>$show->Ten_tin_tuc,"noi_dung_chi_tiet" => $show->Noi_dung_chi_tiet,"noi_dung_tom_gon" => $show->Noi_dung_tom_gon, 
					"thoi_gian_dang" => $show->Thoi_gian_dang,"ma_tai_khoan" =>$show->Ma_tai_khoan,"ma_the_loai_chi_tiet" => $show->Ma_the_loai_chi_tiet,"SL_nguoi_doc" => $show->SL_nguoi_doc
					,"functions" => $functions);
					
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
		else if($_GET['type'] == "add_news")
		{
					//Ma_tin_tuc,Ten_tin_tuc,Noi_dung_chi_tiet,Noi_dung_tom_gon,Thoi_gian_dang,Ma_tai_khoan,Ma_the_loai_chi_tiet,SL_nguoi_doc
					$tentintuc = $_GET['ten_tin_tuc'];
					$noidungchitiet = $_GET['noi_dung_chi_tiet'];
					$noidungtomgon = $_GET['noi_dung_tom_gon'];
					$thoigiandang = $_GET['thoi_gian_dang'];
					$mataikhoan = $_GET['ma_tai_khoan'];
					$matheloaichitiet = $_GET['ma_the_loai_chi_tiet'];
					
					// INSERT INTO `tin_tuc` (`Ma_tin_tuc`, `Ten_tin_tuc`, `Noi_dung_chi_tiet`, `Noi_dung_tom_gon`, `Thoi_gian_dang`, `Ma_tai_khoan`, `Ma_the_loai_chi_tiet`, `SL_nguoi_doc`) 			VALUES (NULL, 'Test', 'test', 'test', '2017-02-02', '2', '11', '0');
					
					$db = new database();
					$sql = "INSERT INTO `tin_tuc`".
							"(`Ten_tin_tuc`, `Noi_dung_chi_tiet`, `Noi_dung_tom_gon`, `Thoi_gian_dang`, `Ma_tai_khoan`, `Ma_the_loai_chi_tiet`, `SL_nguoi_doc`)".
							"VALUES ('".$tentintuc."', '".$noidungchitiet."', '".$noidungtomgon."', '".$thoigiandang."', '".$mataikhoan."', '".$matheloaichitiet."', '0');";
					$db->setQuery($sql);
					$ketqua = $db->query();
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
		else if($_GET['type'] == 'delete_news')
		{
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				$dbx = new database();
					$sql = "DELETE FROM `tin_tuc` WHERE `tin_tuc`.`Ma_tin_tuc` = ".$id;
					//echo $sql;
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
		else if($_GET['type'] == "get_news")
		{
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				$dbx = new database();
					$sql = "select Ten_tin_tuc,Noi_dung_chi_tiet,Noi_dung_tom_gon,Thoi_gian_dang,Ma_tai_khoan,Ma_the_loai_chi_tiet from tin_tuc where `Ma_tin_tuc` = ".$id;
					$dbx->setQuery($sql);
					$ketqua = $dbx->query();
					if($ketqua)
					{
						$data_arr = array();
						$data = $dbx->loadOject();
						foreach($data as $show)
						{
							$data_arr [] = array("ten_tin_tuc"=>$show->Ten_tin_tuc,"noi_dung_chi_tiet" => $show->Noi_dung_chi_tiet,"noi_dung_tom_gon" => $show->Noi_dung_tom_gon, 
					"thoi_gian_dang" => $show->Thoi_gian_dang,"ma_tai_khoan" =>$show->Ma_tai_khoan,"ma_the_loai_chi_tiet" => $show->Ma_the_loai_chi_tiet);
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
		//làm tới khúc này
		else if($_GET['type'] == "edit_news")
		{
			if(isset($_GET['id']))
			{
				//news_name=test&news_nddetail=test&news_ndsm=test&news_time=2017-02-02&news_mtk=3&news_mtl=11
				$id = $_GET['id'];
				$newsname = $_GET['news_name'];
				$newsnddetail = $_GET['news_nddetail'];
				$newsndsm = $_GET['news_ndsm'];
				$newstime = $_GET['news_time'];
				$newsmtk = $_GET['news_mtk'];
				$newsmtl = $_GET['news_mtl'];
				
				$dbx = new database();
					$sql = "UPDATE `tin_tuc` SET". 
					" `Ten_tin_tuc` = "."'".$newsname."'".",".
					"`Noi_dung_chi_tiet` = "."'".$newsnddetail."'".",".
					"`Noi_dung_tom_gon` = "."'".$newsndsm."'".",".
					"`Thoi_gian_dang` = "."'".$newstime."'".",". 
					"`Ma_tai_khoan` = "."'".$newsmtk."'".",".
					"`Ma_the_loai_chi_tiet` = "."'".$newsmtl."'"." ".
					"WHERE `tin_tuc`.`Ma_tin_tuc` = ".$id;
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