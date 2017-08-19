<?php include('server.php');

	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}

?>
<?php
$msg="";
	if(isset($_POST['upload'])){
		$target= "pic/".basename($_FILES['pic']['name']);
		$db= mysqli_connect("localhost","root","","pg");
		$pic= $_FILES['pic']['name'];
		$owner=$_POST['owner'];
		$single=$_POST['single'];
		$rent_single=$_POST['rent_single'];
		$double=$_POST['double'];
		$rent_doubler=$_POST['rent_doubler'];
		$triple=$_POST['triple'];
		$rent_triple=$_POST['rent_triple'];
		$Address=$_POST['Address'];
		$contact=$_POST['contact'];
		$description=$_POST['description'];
		$query= "Update `details` set (pic='$pic', owner='$owner', single='$single', rent_single='$rent_single', doubler='$double', rent_doubler='$rent_doubler', triple='$triple', rent_triple='$rent_triple', Address='$Address', contact='$contact', description='$description') where id=13";
		mysqli_query($db, $query);
		move_uploaded_file($_FILES['pic']['tmp_name'],$target);
	}
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" href="assets/css/uploadcss.css">
	<link rel="stylesheet" href="assets/css/style1.css">
</head>
<body>
	<form method="post" action="<?php echo ($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
	<input type="hidden" name="size" value="1000000">
	<label><strong>Image</strong></label><br>
	<input type="file" name="pic"><br><br>
	<label><strong>Owner's Name</strong></label><br>
	<input type="text" name="owner"><br><br>
	<label><strong>No. of single person rooms available</strong></label><br>
	<input type="text" name="single"><br><br>
	<label><strong>Rent for one person room (per month)</strong></label><br>
	<input type="text" name="rent_single"><br><br>
	<label><strong>No. of double person rooms available</strong></label><br>
	<input type="text" name="double"><br><br>
	<label><strong>Rent for two person room (per month)</strong></label><br>
	<input type="text" name="rent_doubler"><br><br>
	<label><strong>No. of triple person rooms available</strong></label><br>
	<input type="text" name="triple"><br><br>
	<label><strong>Rent for three person room (per month)</strong></label><br>
	<input type="text" name="rent_triple"><br><br>
	<label><strong>Address</strong></label><br>
	<textarea name="Address" cols="40" rows="4"></textarea><br><br>
	<label><strong>Contact No.</strong></label><br>
	<input type="text" name="contact"><br><br>
	<label><strong>Description</strong></label><br>
	<textarea name="description" cols="40" rows="4"></textarea><br><br>
	<br><br>
	<input type="submit" class="button" name="upload">
	</form>
	<a href="index.php" class="button">Back to home page</a>
</body>
</html>
