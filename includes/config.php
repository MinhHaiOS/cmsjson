<?php
session_start();
define('BASEURL', '../layout');
define('HOST', 'localhost');
define('DATABASE','news_hq');
define('USER','root');
define('PASSWORD','');
define('BASEVIEW','../../views');
define('BASEVIEW1', 'view');
class config
{
    const SALT = "fhosdklhfnshsdfoiashodhashsalhdlsa";
    const NUMROW = 10;
    const TITLE = 'Trang tin tức - QuanHai';
    const METAKEY = 'Trang tin tức - QuanHai';
    const METADESC = 'Trang tin tức - QuanHai';
    
    static function base()
	{
		$path = $_SERVER['PHP_SELF'];
		$arrPath = explode('/',$path);
		return $_SERVER['DOCUMENT_ROOT'].'/'.$arrPath[1].'/';
	}
	static function base_url()
	{
		$path = $_SERVER['PHP_SELF'];
		$arrPath = explode('/',$path);
		return "http://".$_SERVER['HOST'].'/'.$arrPath[1].'/';
	}
}

?>