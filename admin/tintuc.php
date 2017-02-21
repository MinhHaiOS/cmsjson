<?php 

require_once ('include/database.php');
$title = "Tin tức - quản trị tin tức";
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
                        <h1 class="page-header">Quản trị tin tức</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- data table user -->
                <div class="row">
                	
                     <button type="button" class="button" id="add_company">Thêm tin tức</button>

      <table class="datatable" id="table_companies">
        <thead>
          <tr>
            <th>Tên tin tức</th>
            <th>Nội dung chi tiết</th>
            <th>Nội dung tóm gọn</th>
            <th>Thời gian đăng</th>
            <th>Mã tài khoản</th>
            <th>Mã thể loại chi tiết</th>
            <th>Số lượng người đọc</th>
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
        
        <h2>Thêm tin tức</h2>
        <form class="form add" id="form_company" data-id="" novalidate>
          <div class="input_container">
            <label for="news_name">Tên tin tức: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="news_name" id="news_name" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="news_nddetail">Nội dung chi tiết: <span class="required">*</span></label>
            <div class="field_container">
              <textarea class="text" name="news_nddetail" id="news_nddetail" required></textarea>
              <!-- <input type="text" class="text" name="news_nddetail" id="news_nddetail" value="" required> -->
            </div>
          </div>
          <div class="input_container">
            <label for="news_ndsm">Nội dung tóm gọn: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="news_ndsm" id="news_ndsm" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="fullname">Thời gian đăng: <span class="required">*</span></label>
            <div class="field_container">
              <input type="date" class="text" name="news_time" id="news_time" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="news_mtk">Mã tài khoản: <span class="required">*</span></label>
            <div class="field_container">
            <select name="news_mtk" id="news_mtk">
            	
            </select>
              
              	

            </div>
          </div>
          <div class="input_container">
            <label for="fullname">Mã thể loại chi tiết: <span class="required">*</span></label>
            <div class="field_container">
              <select name="news_mtl" id="news_mtl">
            	<option value="1">1</option>
                <option value="2">2</option>
            </select>
            </div>
          </div>
          <div class="button_container">
            <button type="submit">Thêm tin tức</button>
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
        
       <?php require_once('baselayout/require_script_tintuc.php');?> 
<?php }
else
{
	header('location: login.php');
	exit();
}
 ?>