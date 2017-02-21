<?php 

require_once ('include/database.php');
$title = "Danh mục - quản trị tin tức";
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
                        <h1 class="page-header">Quản trị danh mục</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- data table user -->
                <div class="row">
                	
                     <button type="button" class="button" id="add_company">Thêm thể loại chi tiết</button>

      <table class="datatable" id="table_companies">
        <thead>
          <tr>
            <th>Tên thể loại chi tiết</th>
            <th>Mã thể loại</th>
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
        
        <h2>Thêm thể loại chi tiết</h2>
        <form class="form add" id="form_company" data-id="" novalidate>
          <div class="input_container">
            <label for="cate_name">Tên thể loại chi tiết: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="cate_name" id="cate_name" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="cate_mtl">Mã thể loại: <span class="required">*</span></label>
            <div class="field_container">
            <select name="cate_mtl" id="cate_mtl"></select>
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
        
       <?php require_once('baselayout/require_script_dm.php');?> 
<?php }
else
{
	header('location: login.php');
	exit();
}
 ?>