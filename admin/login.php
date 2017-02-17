<?php
require_once ('include/database.php');
$title = "Đăng nhập - quản trị tin tức";
require_once('baselayout/header.php');
if(isset($_SESSION['login']))
{
	header('location:index.php');
}
else if(isset($_POST["submit"]))
{
	$user = $_POST["user"];
	$pass = $_POST["mat_khau"];
		if(empty($user) || empty($pass)) 
		{

			$error = '<p class="bg-danger text-center">Đăng nhập thất bại, vui lòng kiểm tra lại</p>';
		}
		else
		{
			$db = new database();			
			$sql = "Select * from quan_tri_vien where Ten_dang_nhap = '".$user."' AND Mat_khau = '".md5($pass)."'";
			//echo $sql;
			$db->setQuery($sql);
			$result = $db->query();
			if($result)
			{
				
				$data = $db->loadrow_fetcharray();
				$_SESSION['login'] = $data['Ho_ten'];
				header('location:index.php');
			}
			else $error = '<p class="bg-danger text-center">Đăng nhập thất bại, vui lòng kiểm tra lại</p>';
		}

}

?>
 <div class="container">
        <div class="row">           
         <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập trang quản trị</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php">
                            <fieldset>
                            	<?php 
									if(isset($error))
									{
										echo $error;
									}
								
								?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tài khoản" name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="mat_khau" type="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input id="remember" type="checkbox" value="1">Ghi nhớ
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                
                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Đăng nhập">

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('baselayout/footerlogin.php');?>