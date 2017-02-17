<?php


class trangchu
{
    public function hien_thi_trang_chu()
    {
		$title = "Trang chủ";
        require CONFIG::base().'view/trangchu/trangchu.php';
    }
	public function hien_thi_trang_con($idtrangcon)
	{
		$title = "Tin Tức - ABC";
		require CONFIG::base().'view/trangcon/trangcon.php';
	}
	public function hien_thi_danh_muc($iddanhmuc)
	{
		$title = "Danh Mục - ABC";
		require CONFIG::base().'view/danhmuc/danhmuc.php';
	}
}

?>
