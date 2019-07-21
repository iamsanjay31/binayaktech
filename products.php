<?php include('includes/header.php'); 
$products = get_products();

?>

        <!--========== PARALLAX ==========-->
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
            <div class="parallax-content container">
                <h1 class="carousel-title">Products</h1>
                <p>Products we have been serving with 10 years of exellence</p>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- Our Exceptional Solutions -->
        <div class="content-lg container">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Our Products</h2>
                    <p>Products we have been serving with 10 years of exellence</p>
                </div>
            </div>
            <!--// end row -->

            <div class="row">
                <!-- Latest Products -->
                <?php foreach($products as $k => $v){ ?>
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="<?php echo rooturl;?>uploads/<?php echo $v['product_image']; ?>" alt="Latest Products Image">
                        </div>
                    </div>
                    <h4><a href="#"><?php echo $v['product_name']; ?></a> </h4>
                    <p><?php echo $v['product_name']; ?></p>
                    <a class="link" href="#">Read More</a>
                </div>
                <?php } ?>
                <!-- End Latest Products -->

              
            </div>
            <!--// end row -->

        
        </div>
        <!-- End Our Exceptional Solutions -->
        <!-- End Promo Section -->
        <!--========== END PAGE LAYOUT ==========-->
<?php include('includes/footer.php'); ?>