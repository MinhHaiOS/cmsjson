
<!-- header -->
<?php require_once('view/layout/header.php') ?>

<!-- navigation bar -->
<?php require_once('view/layout/navigation.php'); ?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục  
                </h1>
            </div>
        </div>
        <!-- /.row -->
		<?php foreach($data as $show) { ?>
        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="layout/img/700x300.png" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><?php echo $show->Ten_the_loai_chi_tiet; ?></h3>
                
                <a class="btn btn-primary" href="trang-chu.qh">Xem tin tức <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>
<?php } ?>
       
        <?php require_once('view/layout/footer.php'); ?>