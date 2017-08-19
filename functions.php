
<?php
include 'connect.php';
session_start();

function loggedin(){
	$query="SELECT * FROM userdata WHERE uname='$uname'";
	$result=mysqli_query($db,$query);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	if($count==1 && $row['pswd'] == $pswd){
	$_SESSION['user_id'] = $row['id'];
	header('location: send.php');
	}
	if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id'])){
		return true;
	}else{
		return false;
	}
}
?>