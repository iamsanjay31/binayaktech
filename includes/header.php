<?php define('rooturl','http://localhost/binayaktech/');
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";include('includes/functions.php');
$pages = get_pages();
?>
<!DOCTYPE html>
<!-- ==============================
    Project:        Metronic "Asentus" Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
    Version:        1.0
    Author:         KeenThemes
    Primary use:    Corporate, Business Themes.
    Email:          support@keenthemes.com
    Follow:         http://www.twitter.com/keenthemes
    Like:           http://www.facebook.com/keenthemes
    Website:        http://www.keenthemes.com
    Premium:        Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
================================== -->
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Binayak Tech</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="css/animate.css" rel="stylesheet">
        <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body>

        <!--========== HEADER ==========-->
        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="index.php" style = 'font-size:23px; color:#fff;'>
                               Binayaktech
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="navbar-nav navbar-nav-right">
                                <li class="nav-item"><a class="nav-item-child nav-item-hover <?php if(($actual_link == rooturl.'index.php') || ($actual_link == rooturl)){echo 'active';} ?>" href="<?php echo rooturl;?>">Home</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover <?php if(($actual_link == rooturl.'portfolio.php')){echo 'active';} ?>" href="<?php echo rooturl;?>portfolio.php">Portfolio</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover <?php if(($actual_link == rooturl.'products.php')){echo 'active';} ?>" href="<?php echo rooturl;?>products.php">Products</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover <?php if(($actual_link == rooturl.'ourteam.php')){echo 'active';} ?>" href="<?php echo rooturl;?>ourteam.php">Our Team</a></li>

                                <?php foreach($pages as $k => $v){ ?>
                                 <?php //echo $actual_link; ?>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover <?php if(($actual_link == rooturl.'page.php?id='.$v['pages_id'])){echo 'active';} ?>" href="<?php echo rooturl;?>page.php?id=<?php echo $v['pages_id']?>"><?php echo $v['pages_name'];?></a></li>
                                <?php } ?>
                                <!-- <li class="nav-item"><a class="nav-item-child nav-item-hover" href="faq.html">About</a></li> -->
                                
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>