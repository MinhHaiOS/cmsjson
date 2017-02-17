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
                        <h1 class="page-header">Tin Tức</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
       <?php require_once('baselayout/footerlogin.php');?> 
<?php }
else
{
	header('location: login.php');
	exit();
}
 ?>