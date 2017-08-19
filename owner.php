<?php
	include ('server.php');
	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NCU PG MANAGEMENT</title>
	<link rel="stylesheet" type="text/css" href="assets/css/owner.css">
	<link href="assets/font-awsm/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="assets/images/ncu-formerly-itmu-logo.jpg">
</head>
<body>
	<header>
		<div id="header-innner">
			<a href="http://www.ncuindia.edu" id="logo"></a>
			<nav>
				<a href="#" id="menu-icon"></a><!---don't change-->
				<ul>
					<li><a href="owner.php" class="current">HOME</a></li>
					<li><a href="changepassword.php" class="current">Change Password</a></li>
					<li><a href="Reviews.php" class="current">Reviews</a></li>
					<li><a href="logout.php" class="current">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section class="banner">
		<div class="bannner-inner">
			<i class="fa fa-graduation-cap" aria-hidden="true"></i><br>
			<h4 align="center"><strong>Welcome <?php echo  $_SESSION['uname'];?></strong></h4>
		</div>
	</section>

	<section class="one-fourth" id="id1">
		<td><a href="http://www.ncuindia.edu/about-us"><i class="fa fa-institution"></i></a></td>
		<h3>About us</h3>
	</section>

	<section class="one-fourth" id="id2">
		<td><a href="upload.php"><i class="fa fa-upload"></i></a></td>
		<h3>Upload AD</h3>
	</section>

	<section class="one-fourth" id="id3">
		<td><a href="deleteAd.php"><i class="fa fa-trash"></i></a></td>
		<h3>Delete AD</h3>
	</section>

	<section class="one-fourth" id="id4">
		<td><a href="messages.php"><i class="fa fa-users" aria-hidden="true"></i></a></td>
		<h3>Messages</h3>
	</section>

	<section class="inner-wrapper">
		<article id="id5">
			<i class="fa fa-handshake-o" aria-hidden="true"></i>
		</article>

		<aside id="id52">
			<h2>An Initiative By NCU</h2>
			<p>NCU for the sake of its students has decided to make an online website for PG. </p>
		</aside>
	</section>

	<section class="inner-wrapper-2">
		<article id="id6">
			<h2>NO Charges for posting Ads</h2>
			<p>NCU made it completely free for the PG owners to post Ads. You can post one AD per head.</p>
		</article>

		<aside id="id5">
			<i class="fa fa-upload"></i>
		</aside>
	</section>


	<section class="inner-wrapper-3">
		<section class="one-third" id="f1">
			<h3>Your Average Ratings</h3>
			<p>
			<h3>
				<?php
					$uname=$_SESSION['uname'];
				 	$query="Select * from review where owner='$uname'";
					$result= mysqli_query($db, $query);
					if($result){
					$count= mysqli_num_rows($result);
					$query1="Select sum(overall) as overall from review where owner='$uname'";
					$result1=mysqli_query($db,$query);
					if($result1&&$count){
					$sum=0;
					while ($row = mysqli_fetch_assoc($result)){
				    $value = $row['overall'];

				    $sum += $value;
					}

					echo $sum/$count;
				}else{
					echo "Not Rated Yet";
				}
				}
				?>
			</h3>

	 	</p>
		</section>

		<section class="one-third" id="f2">
			<h3>Total Number of Reviews</h3>
			<p><h3><?php if($count){echo $count;}else{ echo "No Reviews Yet";} ?></h3></p>
		</section>

		<section class="one-third" id="f3">
			<h3>Brief description of your Ad</h3>
			<p>
				<h3>
				<?php
					$query="Select sum(single) as single, sum(doubler) as doubler, sum(triple) as triple from details where owner='$uname'";
					$result= mysqli_query($db,$query);
					if($result){
					$row= mysqli_fetch_assoc($result);
					echo "Single occupancy : ";
					echo $row['single'];
					echo "<br>Double occupancy : ";
					echo $row['doubler'];
					echo "<br>Triple occupancy : ";
					echo $row['triple'];
				}else{
					echo "You haven't uploaded your Ad";
				}
				?>
			</h3>
			</p>
		</section>
	</section>

	<section id="smiley">
		<h2>☺</h2>
	</section>

	<footer>
		<ul class="social">
			<li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
			<li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
		</ul>
	</footer>
	<footer class="second">
		<p>&copy; The North Cap University</p>
	</footer>
</body>
