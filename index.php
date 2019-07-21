<?php 
include('includes/header.php');
$sliders = get_slider();
$products = get_products();
$clients = get_clients();
$portfolio = get_portfolios();
$testimonials = get_testimonials();

?>
        <!--========== END HEADER ==========-->

        <!--========== SLIDER ==========-->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="container">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <?php foreach ($sliders as $key => $value) { ?>
                    <?php if($key == 0){?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="active"></li>
                    <?php }else{?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>"></li>
                    <?php } ?>
                <?php }?>
                </ol>
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            <?php foreach($sliders as $k => $v){ ?>
            <?php if($k == 0){ ?>
                <div class="item active">
                    <img class="img-responsive" src="<?php echo rooturl;?>uploads/<?php echo $v['gallery_image']; ?>" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                              
                                <h2 style = 'color:#fff;'><?php echo $v['gallery_caption']; ?></h2>
                                <p><?php echo $v['gallery_detail']; ?></p>
                            </div>
                         
                        </div>
                    </div>
                </div>
            <?php }else { ?>
           
                <div class="item">
                    <img class="img-responsive" src="<?php echo rooturl;?>uploads/<?php echo $v['gallery_image']; ?>" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                               <h2 style = 'color:#fff;'><?php echo $v['gallery_caption']; ?></h2>
                                <p><?php echo $v['gallery_detail']; ?></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php }} ?>
            </div>
        </div>
        <!--========== SLIDER ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- Service -->
       
        <!-- End Service -->

        <!-- Latest Products -->
        <div class="content-lg container">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Latest Products</h2>
                    <?php 
                    if(isset($_SESSION['msg'])){
                        ?>
                        <script>alert("<?php echo $_SESSION['msg']?>");</script>
                    <?php
                        unset($_SESSION['msg']);
                    } ?>
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
        <!-- End Latest Products -->

        <!-- Clients -->
        <div class="bg-color-sky-light">
            <div class="content-lg container">
                <!-- Swiper Clients -->
                <div class="swiper-slider swiper-clients">
                    <!-- Swiper Wrapper -->
                    <div class="swiper-wrapper">

                        <?php foreach($clients as $k => $v){ ?>

                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="<?php echo rooturl;?>uploads/<?php echo $v['client_image']; ?>" alt="Clients Logo">
                        </div>

                        <?php } ?>
                        
                    </div>
                    <!-- End Swiper Wrapper -->
                </div>
                <!-- End Swiper Clients -->
            </div>
        </div>
        <!-- End Clients -->

        <!-- Testimonials -->
        <div class="content-lg container">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Customer Reviews</h2>

                    <!-- Swiper Testimonials -->
                    <div class="swiper-slider swiper-testimonials">
                        <!-- Swiper Wrapper -->
                        <div class="swiper-wrapper">
                        <?php foreach($testimonials as $k => $v){?>
                            <div class="swiper-slide">
                                <blockquote class="blockquote">
                                    <div class="margin-b-20">
                                        <?php echo $v['testimonial_desc'];?>
                                    </div>
                                    
                                    <p><span class="fweight-700 color-link"><?php echo $v['testimonial_by']; ?></span></p>
                                </blockquote>
                            </div>
                        <?php } ?>
                            
                        </div>
                        <!-- End Swiper Wrapper -->

                        <!-- Pagination -->
                        <div class="swiper-testimonials-pagination"></div>
                    </div>
                    <!-- End Swiper Testimonials -->
                </div>
            </div>
            <!--// end row -->
        </div>
        <!-- End Testimonials -->

       

     

        <!-- Work -->

            <div class="content-lg container">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Our Portfolio</h2>
                   
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
        </div>


        <!-- End Work -->
        <!--========== END PAGE LAYOUT ==========-->

       <?php include('includes/footer.php'); ?>