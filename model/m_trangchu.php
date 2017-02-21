<?php

class m_trangchu
{
	
	public function lay_tin_tuc()
	{
		$db = new database();
		$sql = "SELECT tin_tuc.*,quan_tri_vien.Ho_ten as `tennguoidang` FROM tin_tuc inner join quan_tri_vien where tin_tuc.Ma_tai_khoan = quan_tri_vien.Ma_tai_khoan";
		$db->setQuery($sql);
		$result = $db->query();
		if($result)
			{
				return $db->loadOject();
			}
		else
		{
			return false;
		}
	}
	public function lay_tin_tuc_theo_id($id)
	{
		$db = new database();
		$sql = "SELECT tin_tuc.*,quan_tri_vien.Ho_ten as `tennguoidang` FROM tin_tuc inner join quan_tri_vien where tin_tuc.Ma_tai_khoan = quan_tri_vien.Ma_tai_khoan AND Ma_tin_tuc = ".$id;
		$db->setQuery($sql);
		$result = $db->query();
		if($result)
			{
				return $db->loadOject();
			}
		else
		{
			return false;
		}
	}
	public function lay_chi_tiet_the_loai($id)
	{
		$db = new database();
		$sql = "SELECT * FROM the_loai_chi_tiet where Ma_the_loai = ".$id;
		$db->setQuery($sql);
		$result = $db->query();
		if($result)
			{
				return $db->loadOject();
			}
		else
		{
			return false;
		}
	}
	public function lay_the_loai()
	{
		$db = new database();
		$sql = "Select * from the_loai";
		$db->setQuery($sql);
		$result = $db->query();
		if($result)
			{
				return $db->loadOject();
			}
		else
		{
			return false;
		}
	}
	

	
}



?>