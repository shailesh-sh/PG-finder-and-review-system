<?php
include('server.php');

	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}
?>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/rate.css">
<link rel="stylesheet" href="assets/css/w3.css">
<?php
$error=false;
$name=trim($_GET['name']);

if(isset($_POST['submit'])){

if(!isset($_POST['food'])){
	$error=true;
	$errorFood="Please give ratings";
}

if(!isset($_POST['location'])){
	$error=true;
	$errorLocation="Please give ratings";
}

if(!isset($_POST['laundry'])){
	$error=true;
	$errorLaundry="Please give ratings";
}

if(!isset($_POST['wifi'])){
	$error=true;
	$errorWiFi="Please give ratings";
}

if(!isset($_POST['behaviour'])){
	$error=true;
	$errorBehaviour="Please give ratings";
}

if(!($error)){
	$uname=$_SESSION['uname'];
	$food=$_POST['food'];
	$location=$_POST['location'];
	$laundry=$_POST['laundry'];
	$wifi=$_POST['wifi'];
	$behaviour=$_POST['behaviour'];
	$overall= ($food+ $location+ $laundry+ $wifi+ $behaviour)/5;
	$query1="UPDATE `review` SET `food`='$food',`location`='$location',`laundry`='$laundry',`wifi`='$wifi',`behaviour`='$behaviour',`overall`='$overall' WHERE `postedby`='$uname' and `owner`=$name";
	$result=mysqli_query($db,$query1);
	if($result){
		echo "<script>alert ('Your Ratings have been submitted');window.location.href='index.php';</script>";
		
	}
}
}
?>


<div class="stars">

  <form action="" method="post">

	<align="center">Food
	<?php if(isset($errorFood)){?>
	<div class="error"><?php echo $errorFood;?></div>
	<?php } ?><br>
    <input class="star star-5" id="star-5" type="radio" name="food" value="5"/>

    <label class="star star-5" for="star-5"></label>

    <input class="star star-4" id="star-4" type="radio" name="food" value="4"/>

    <label class="star star-4" for="star-4"></label>

    <input class="star star-3" id="star-3" type="radio" name="food" value="3"/>

    <label class="star star-3" for="star-3"></label>

    <input class="star star-2" id="star-2" type="radio" name="food" value="2"/>

    <label class="star star-2" for="star-2"></label>

    <input class="star star-1" id="star-1" type="radio" name="food" value="1"/>

    <label class="star star-1" for="star-1"></label>




	<align="center">Location
	<?php if(isset($errorLocation)){?>
	<div class="error"><?php echo $errorLocation;?></div>
	<?php } ?><br>
    <input class="star star-5" id="star-10" type="radio" name="location" value="5"/>

    <label class="star star-5" for="star-10"></label>

    <input class="star star-4" id="star-9" type="radio" name="location" value="4"/>

    <label class="star star-4" for="star-9"></label>

    <input class="star star-3" id="star-8" type="radio" name="location" value="3"/>

    <label class="star star-3" for="star-8"></label>

    <input class="star star-2" id="star-7" type="radio" name="location" value="2"/>

    <label class="star star-2" for="star-7"></label>

    <input class="star star-1" id="star-6" type="radio" name="location" value="1"/>

    <label class="star star-1" for="star-6"></label>


	<align="center">Laundry
	<?php if(isset($errorLaundry)){?>
	<div class="error"><?php echo $errorLaundry;?></div>
	<?php } ?><br>
    <input class="star star-5" id="star-15" type="radio" name="laundry" value="5"/>

    <label class="star star-5" for="star-15"></label>

    <input class="star star-4" id="star-14" type="radio" name="laundry" value="4"/>

    <label class="star star-4" for="star-14"></label>

    <input class="star star-3" id="star-13" type="radio" name="laundry" value="3"/>

    <label class="star star-3" for="star-13"></label>

    <input class="star star-2" id="star-12" type="radio" name="laundry" value="2"/>

    <label class="star star-2" for="star-12"></label>

    <input class="star star-1" id="star-11" type="radio" name="laundry" value="1"/>

    <label class="star star-1" for="star-11"></label>


	<align="center">WiFi
	<?php if(isset($errorWiFi)){?>
	<div class="error"><?php echo $errorWiFi;?></div>
	<?php } ?>	<br>
    <input class="star star-5" id="star-20" type="radio" name="wifi" value="5"/>

    <label class="star star-5" for="star-20"></label>

    <input class="star star-4" id="star-19" type="radio" name="wifi" value="4"/>

    <label class="star star-4" for="star-19"></label>

    <input class="star star-3" id="star-18" type="radio" name="wifi" value="3"/>

    <label class="star star-3" for="star-18"></label>

    <input class="star star-2" id="star-17" type="radio" name="wifi" value="2"/>

    <label class="star star-2" for="star-17"></label>

    <input class="star star-1" id="star-16" type="radio" name="wifi" value="1"/>

    <label class="star star-1" for="star-16"></label>


	<align="center">Owner's Behaviour
	<?php if(isset($errorBehaviour)){?>
	<div class="error"><?php echo $errorBehaviour;?></div>
	<?php } ?>	<br>
    <input class="star star-5" id="star-25" type="radio" name="behaviour" value="5"/>

    <label class="star star-5" for="star-25"></label>

    <input class="star star-4" id="star-24" type="radio" name="behaviour" value="4"/>

    <label class="star star-4" for="star-24"></label>

    <input class="star star-3" id="star-23" type="radio" name="behaviour" value="3"/>

    <label class="star star-3" for="star-23"></label>

    <input class="star star-2" id="star-22" type="radio" name="behaviour" value="2"/>

    <label class="star star-2" for="star-22"></label>

    <input class="star star-1" id="star-21" type="radio" name="behaviour" value="1"/>

    <label class="star star-1" for="star-21"></label>

	<input type="submit" name="submit" value="submit">
  </form>

</div>
