<?php include('includes/header.php');
$portfolio = get_portfolios();

 ?>

        <!--========== PARALLAX ==========-->
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
            <div class="parallax-content container">
                <h1 class="carousel-title">Portfolio</h1>
                <p>Our Prestigious Projects with 25 years of excellence</p>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- Our Exceptional Solutions -->
        <div class="content-lg container">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Our Portfolio</h2>
                    <p>Our Prestigious Projects with 25 years of excellence</p>
                </div>
            </div>
            <!--// end row -->

             <div class="row">
                <!-- Latest Products -->
                <?php foreach($portfolio as $k => $v){ ?>
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="<?php echo rooturl;?>uploads/<?php echo $v['portfolio_image']; ?>" alt="Latest Products Image">
                        </div>
                    </div>
                    <h4><a target = '_blank' href="<?php echo $v['portfolio_link']; ?>"><?php echo $v['portfolio_name']; ?></a> </h4>
                    <p><?php echo $v['portfolio_detail']; ?></p>
                    <a class="link" target = '_blank' href="<?php echo $v['portfolio_link']; ?>">Read More</a>
                </div>
                <?php } ?>
                <!-- End Latest Products -->

              
            </div>
            <!--// end row -->

            <!--// end row -->
        </div>
        <!-- End Our Exceptional Solutions -->

        
        <!--========== END PAGE LAYOUT ==========-->
<?php include('includes/footer.php'); ?>