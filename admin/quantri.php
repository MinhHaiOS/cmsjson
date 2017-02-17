<?php 

require_once ('include/database.php');
$title = "Thành viên - quản trị tin tức";
require_once('baselayout/header.php');
if(isset($_SESSION['login']))
{
?>
<div id="wrapper">
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php require_once('baselayout/navigation_bar_top.php'); ?>

             <?php require_once('baselayout/navigation_bar_left.php'); ?>
        </nav>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản trị thành viên</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- data table user -->
                <div class="row">
                	
                     <button type="button" class="button" id="add_company">Thêm thành viên</button>

      <table class="datatable" id="table_companies">
        <thead>
          <tr>
            <th>Tên Đăng Nhập</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </div>

    <div class="lightbox_bg"></div>

    <div class="lightbox_container" >
      <div class="lightbox_close"></div>
      <div class="lightbox_content">
        
        <h2>Thêm thành viên</h2>
        <form class="form add" id="form_company" data-id="" novalidate>
          <div class="input_container">
            <label for="user">Tài khoản: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="user" id="user" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="password">Mật khẩu: <span class="required">*</span></label>
            <div class="field_container">
              <input type="password" class="text" name="password" id="password" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="email">Email: <span class="required">*</span></label>
            <div class="field_container">
              <input type="email" class="text" name="email" id="email" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="fullname">Họ tên: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="fullname" id="fullname" value="" required>
            </div>
          </div>
          <div class="button_container">
            <button type="submit">Thêm thành viên</button>
          </div>
        </form>
        
      </div>
    </div>

    <noscript id="noscript_container">
      <div id="noscript" class="error">
        <p>JavaScript support is needed to use this page.</p>
      </div>
    </noscript>

    <div id="message_container">
      <div id="message" class="success">
        <p>This is a success message.</p>
      </div>
    </div>

    <div id="loading_container">
      <div id="loading_container2">
        <div id="loading_container3">
          <div id="loading_container4">
            Đang tải, Vui lòng đợi...
          </div>
        </div>
      </div>
    </div>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        
       <?php require_once('baselayout/require_script.php');?> 
<?php }
else
{
	header('location: login.php');
	exit();
}
 ?>