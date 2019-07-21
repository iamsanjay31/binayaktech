<?php include('includes/header.php');
$team = get_members();
 ?>
<div class="parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
            <div class="parallax-content container">
                <h1 class="carousel-title">Our Team</h1>
                <p>Meet our team of extraordinary talent.</p>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->

        <!-- Team -->
        <div class="bg-color-sky-light">
            <div class="content-lg container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2>Meet the Team</h2>
                        <p>Meet our team of extraordinary talent.</p>
                    </div>
                </div>
                <!--// end row -->

                <div class="row">
                    <!-- Team -->

                    <?php foreach($team as $k => $v){?>
                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="bg-color-white margin-b-20">
                            <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                                <img class="img-responsive" src="<?php echo rooturl;?>uploads/<?php echo $v['staff_image'];?>" alt="Team Image">
                            </div>
                        </div>
                        <h4><a href="#"><?php echo $v['staff_name']?></a> <span class="text-uppercase margin-l-20"><?php echo $v['staff_designation']?></span></h4>
                        
                        <a class="link" target = '_blank' href="<?php echo $v['linkedin_url'];?>">LinkedIn</a>
                    </div>
                    <?php } ?>
                    <!-- End Team -->
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Team -->
<?php include('includes/footer.php'); ?>