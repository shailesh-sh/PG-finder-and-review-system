<?php include('server.php');

	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}
?>
<html>
<head>
	<title>NEW CONVERSATIONS</title>
</head>
<body>
<?php include('connect.php');?>
<?php include('title_bar.php');?>

<?php include('message_title_bar.php')?>
<br>
<div>
<?php
if(isset($_GET['user'])&& !empty($_GET['user'])){
?>
<form method="post">
<?php
if(isset($_POST['message']) && !empty($_POST['message'])){
	$my_id=$_SESSION['user_id'];
	$user=$_GET['user'];
	$result=$db->query("SELECT id from userdata where uname='$user'");

	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	if($count==1){
		$uid = $row['id'];
}

	$random=rand();
	$message= $_POST['message'];
	$check_con=$db->query("SELECT hash from message_group where (user_one='$my_id' and user_two='$uid') or (user_one='$uid' and user_two='$my_id')");
	if(mysqli_num_rows($check_con)==1){
		echo("<p>conversation started</p>");
	}else{
	$db->query("INSERT INTO message_group values ('$my_id','$uid','$random')");
	$db->query("INSERT INTO messages values ('','$random','$my_id','$message')");
	}
}
?>

Enter message:<br>
<textarea name="message" rows="7" cols="60"></textarea>
<br><br>
<input type="submit" value="send message">
</form>
<?php
}else{
	echo "<b>Select User</b>";
	$user_list=$db->query("SELECT `id`, `uname` from `userdata`");
	while($run_user= mysqli_fetch_array($user_list)){
		$user= $run_user['id'];
		$uname= $run_user['uname'];

		echo "<p><a href='send.php?user=$uname'>$uname</a></p>";
	}
}?>
</div>

</body>
</html>
