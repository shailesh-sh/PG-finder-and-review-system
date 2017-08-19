<?php 
include('server.php');

	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}
?>
<?php
	$uname=$_SESSION['uname'];
	$query="DELETE FROM `details` WHERE owner='$uname'";
	$result=mysqli_query($db,$query);
	if($result){
		echo '<script>alert ("Deleted Successfully");
		window.location.href="upload.php";</script>';
		
	}else{
		echo '<script>alert ("Error in deleting the Ad")</script>';
	}
?>