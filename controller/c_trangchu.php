<?php

include_once('model/m_trangchu.php');
class trangchu
{
    public function hien_thi_trang_chu()
    {
		$title = "Trang chủ - Tin tức QH";
		$m_obj = new m_trangchu();
		$data = $m_obj->lay_tin_tuc();
		$the_loai = $m_obj->lay_the_loai();

        require CONFIG::base().'view/trangchu/trangchu.php';
    }
	public function hien_thi_trang_con($idtrangcon)
	{
		$title = "Tin Tức - Tin tức QH";
		$m_obj = new m_trangchu();
		$data = $m_obj->lay_tin_tuc_theo_id($idtrangcon);
		$the_loai = $m_obj->lay_the_loai();
		require CONFIG::base().'view/trangcon/trangcon.php';
	}
	public function hien_thi_danh_muc($iddanhmuc)
	{
		$title = "Danh Mục - Tin tức QH";
		$m_obj = new m_trangchu();
		$the_loai = $m_obj->lay_the_loai();
		$data = $m_obj->lay_chi_tiet_the_loai($iddanhmuc);
		require CONFIG::base().'view/danhmuc/danhmuc.php';
	}
}

?>
