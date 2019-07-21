<?php include('includes/header.php');
$id = $_GET['id'];
$page = get_page_single($id);
?>
<div class="parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
            <div class="parallax-content container">
                <h1 class="carousel-title"><?php echo $page['pages_name'];?></h1>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->
      

        <!-- About -->
        <div class="content-lg container">
            <div class="row margin-b-20">
                <div class="col-sm-6">
                    <h2><?php echo $page['pages_name'];?></h2>
                </div>
            </div>
            <!--// end row -->

            <div class="row">
                <div class="col-sm-7 sm-margin-b-50">
                    <div class="margin-b-30">
                        <p><?php echo $page['pages_content'];?></p>
                    </div>
                   
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <img class="img-responsive" src="<?php echo rooturl;?>uploads/<?php echo $page['pages_image']; ?>" alt="Our Office">
                </div>
            </div>
            <!--// end row -->
        </div>
        <!-- End About -->

<?php include('includes/footer.php'); ?>