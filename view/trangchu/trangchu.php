 <!-- header -->
<?php require_once('view/layout/header.php') ?>

<!-- navigation bar -->
<?php require_once('view/layout/navigation.php'); ?>

 
 <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Trang chủ
                </h1>
<?php  foreach($data as $show){?>
                <!-- First Blog Post -->
                <h2>
                    <a href="tin-<?php echo $show->Ten_tin_tuc; ?>-<?php echo $show->Ma_tin_tuc;?>.qh"><?php echo $show->Ten_tin_tuc ?></a>
                </h2>
                <p class="lead">
                    bởi <a href="#"><?php echo $show->tennguoidang ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Đăng vào <?php echo $show->Thoi_gian_dang ?></p>
                <hr>
                <img class="img-responsive" src="layout/img/900x300.png" alt="">
                <hr>
                <p><?php echo $show->Noi_dung_tom_gon ?></p>
                <a class="btn btn-primary" href="tin-<?php echo $show->Ten_tin_tuc; ?>-<?php echo $show->Ma_tin_tuc;?>.qh">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
<?php } ?>
                
					<!-- 
                <!-- Pager 
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>

             <?php require_once('view/layout/right_sidebar.php'); ?>

        </div>
        <!-- /.row -->
           <hr>
<?php require_once('view/layout/footer.php') ?>