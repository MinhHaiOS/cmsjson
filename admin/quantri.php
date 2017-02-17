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
            <th>Rank</th>
            <th>Company name</th>
            <th>Industries</th>
            <th>Revenue</th>
            <th>Year</th>
            <th>Employees</th>
            <th>Market cap</th>
            <th>Headquarters</th>
            <th>Functions</th>
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
        
        <h2>Add company</h2>
        <form class="form add" id="form_company" data-id="" novalidate>
          <div class="input_container">
            <label for="rank">Rank: <span class="required">*</span></label>
            <div class="field_container">
              <input type="number" step="1" min="0" class="text" name="rank" id="rank" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="company_name">Company name: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="company_name" id="company_name" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="industries">Industries: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="industries" id="industries" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="revenue">Revenue: <span class="required">*</span></label>
            <div class="field_container">
              <input type="number" step="1" min="0" class="text" name="revenue" id="revenue" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="fiscal_year">Fiscal year: <span class="required">*</span></label>
            <div class="field_container">
              <input type="number" min="0" class="text" name="fiscal_year" id="fiscal_year" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="employees">Employees: <span class="required">*</span></label>
            <div class="field_container">
              <input type="number" min="0" class="text" name="employees" id="employees" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="market_cap">Market cap: <span class="required">*</span></label>
            <div class="field_container">
              <input type="number" step="1" min="0" class="text" name="market_cap" id="market_cap" value="" required>
            </div>
          </div>
          <div class="input_container">
            <label for="headquarters">Headquarters: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="headquarters" id="headquarters" value="" required>
            </div>
          </div>
          <div class="button_container">
            <button type="submit">Add company</button>
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