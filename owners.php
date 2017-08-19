<?php include('server.php');

	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}

?>
<?php include 'search.php';?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.12.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/ncu-formerly-itmu-logo-249x128.jpg" type="image/x-icon">
  <meta name="description" content="Helpful in directly connecting students to the PG owners">
  <title>NCU PG Finder & Review System</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="assets/css/w3.css">
  <link rel="stylesheet" href="assets/css/style2.css">
  <link rel="stylesheet" href="assets/css/image.css">
</head>
<body>
<br><br>
<section id="menu-f">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">

                        <a class="navbar-caption" href="http://www.ncuindia.edu">The NorthCap University&nbsp;</a>
					</div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="https://ncuindia.edu"></a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-red-outline btn-black" href="messages.php">Messages</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-red-outline btn-black" href="upload.php">Upload PG</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-red-outline btn-black" href="index1.php?logout='1'" style="color: red;">Log out</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"><a rel="external" href="http://www.ncuindia.edu">NCUINDIA</a></section><section class="mbr-slider mbr-section mbr-section__container carousel slide mbr-section-nopadding mbr-after-navbar" data-ride="carousel" data-keyboard="false" data-wrap="true" data-pause="false" data-interval="5000" id="slider-g">
    <div>
        <div>
            <div>
                <ol class="carousel-indicators">
                    <li data-app-prevent-settings="" data-target="#slider-g" data-slide-to="0" class="active"></li><li data-app-prevent-settings="" data-target="#slider-g" data-slide-to="1"></li><li data-app-prevent-settings="" data-target="#slider-g" data-slide-to="2"></li><li data-app-prevent-settings="" data-target="#slider-g" class="" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full active" data-bg-video-slide="false" style="background-image: url(assets/images/man-back.jpg);">
                        <div class="mbr-table-cell">
                            <div class="mbr-overlay"></div>
                            <div class="container-slide container">

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2 text-xs-center">
                                        <h2 class="mbr-section-title display-1">
										<?php if (isset($_SESSION['uname']));?>
										<p>Welcome <strong><?php echo $_SESSION['uname']; ?></strong></p>
										<br><br></h2>
                                        <p class="mbr-section-lead lead"></p>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/7011267-12845422631-large-2000x1340.jpg);">
                        <div class="mbr-table-cell">
                            <div class="mbr-overlay"></div>
                            <div class="container-slide container">

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-1">
                                        <h2 class="mbr-section-title display-1">ONE PERSON ROOM CURRENTLY AVAILABLE &nbsp;<br>
										<?php
										$query = "SELECT * FROM details";
										$query_run = $db->query($query);
										$qty= 0;
										while ($num = mysqli_fetch_assoc ($query_run)) {
	    									$qty += $num['single'];
										}
										echo $qty;?></h2>
                                        <p class="mbr-section-lead lead"></p>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/582a020c9ec6683ac089aa25-2000x1545.jpg);">
                        <div class="mbr-table-cell">
                            <div class="mbr-overlay"></div>
                            <div class="container-slide container">

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-3 text-xs-right">
                                        <h2 class="mbr-section-title display-1">TWO PERSON ROOM CURRENTLY AVAILABLE &nbsp;<br>
										<?php
										$query = "SELECT * FROM details";
										$query_run = $db->query($query);
										$qty= 0;
										while ($num = mysqli_fetch_assoc ($query_run)) {
	    									$qty += $num['doubler'];
										}
										echo $qty;?></h2>
                                        <p class="mbr-section-lead lead"></p>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="mbr-section mbr-section-hero carousel-item dark center mbr-section-full" data-bg-video-slide="false" style="background-image: url(assets/images/mbr-2000x3000.jpg);">
                        <div class="mbr-table-cell">
                            <div class="mbr-overlay"></div>
                            <div class="container-slide container">

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-3 text-xs-right">
                                        <h2 class="mbr-section-title display-1">THREE PERSON ROOM CURRENTLY AVAILABLE &nbsp;<br>
										<?php
										$query = "SELECT * FROM details";
										$query_run = $db->query($query);
										$qty= 0;
										while ($num = mysqli_fetch_assoc ($query_run)) {
	    									$qty += $num['triple'];
										}
										echo $qty;?>
										</h2>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a data-app-prevent-settings="" class="left carousel-control" role="button" data-slide="prev" href="#slider-g">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a data-app-prevent-settings="" class="right carousel-control" role="button" data-slide="next" href="#slider-g">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<br><br>

<div class="row">
<ul><li class="nav-item"><a class="nav-link link" href="https://ncuindia.edu"></a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-red-outline btn-black" href="messages.php">Messages</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-red-outline btn-black" href="upload.php">Upload PG</a></li><li class="nav-item nav-btn"><a class="nav-link btn btn-red-outline btn-black" href="index1.php?logout='1'" style="color: red;">Log out</a></li></ul>
</div>




<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-j" style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">

    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><a href="http://www.ncuindia.edu"><img src="assets/images/ncu-formerly-itmu-logo.jpg"></a></div>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p></p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p></p><p><strong>NCU</strong><br>
<a href="http://www.ncuindia.edu/about-us">About Us</a><br>
<a href="https://www.google.co.in/maps/place/%E0%A4%A5%E0%A5%87+%E0%A4%A8%E0%A5%8B%E0%A4%B0%E0%A5%8D%E0%A4%A5%E0%A5%8D%E0%A4%95%E0%A5%85%E0%A4%AA+%E0%A4%AF%E0%A5%82%E0%A4%A8%E0%A4%BF%E0%A4%B5%E0%A5%8D%E0%A4%B9%E0%A4%B0%E0%A5%8D%E0%A4%B8%E0%A4%BF%E0%A4%9F%E0%A5%80/@28.5036497,77.0476115,17z/data=!3m1!4b1!4m5!3m4!1s0x390d199c98e90ff1:0x8b2aa76c53fb738e!8m2!3d28.504167!4d77.049091">Locate Us</a><br>
<a href="http://www.ncuindia.edu/footermost-menu/contact">Contact Us</a>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p></p><p><strong>Links</strong><br>
<a href="http://www.ncuindia.edu/">HOME</a><br></p><p></p>
            </div>

        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
  <script src="assets/theme/js/script.js"></script>


  </body>
</html>
