<?php include ('server.php');

if(empty($_SESSION['uname'])){
  header('location: login.php');
}
?>
<?php
	$uname=$_SESSION['uname'];

	if(isset($_POST['submit'])){
		$db=mysqli_connect('localhost','root','','pg');
		$review=$_POST['message'];
		$name=$_POST['name'];
		$query="Insert into review(id, owner, review, postedby) values ('', '$name', '$review', '$uname') ";
		$res=mysqli_query($db, $query);
		if($res){
		header("location: Rate.php?name='$name' ");
	}
	}
?>
<html>
<head>
  <?php include "header.php"; ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.12.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/ncu-formerly-itmu-logo-249x128.jpg" type="image/x-icon">
  <meta name="description" content="">
  <title>Rate & Review</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="style1.css">




</head>
<body>

<section class="engine"><a rel="external" href="http://www.ncuindia.edu">NCU INDIA</a></section><section class="mbr-section" id="form1-q" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2">Write Review</h3>

                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">


                    <div data-form-alert="true">
                        <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">Thanks for giving Reviews!</div>
                    </div>


                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method= "post">

                        <div class="row row-sm-offset">

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-q-name">PG/Owner Name<span class="form-asterisk">*</span></label>
                                    <input type="text" class="form-control" name="name" required="" data-form-field="Name" id="form1-q-name">
                                </div>
                            </div>





                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="form1-q-message">Message*</label>
                            <textarea class="form-control" name="message" required rows="7"></textarea>
                        </div>

												<div><button type="submit" name="submit" class="btn btn-primary">submit</button></div>
												<?php if(isset($success)){?><div class="error success"><?php  echo $success?> </div><?php } ?>
								
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="btn-black"><a href="index.php">Back to Home Page</a></div>
<?php include('footer.php')?>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>



  </body>
</html>
