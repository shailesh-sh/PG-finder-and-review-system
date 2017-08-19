<html>
<head>
	<title>Messages</title>
</head>
<body>
<?php include('connect.php');?>
<?php include('functions.php');?>
<?php include('title_bar.php');?>

<?php include('message_title_bar.php');?>
<?php $my_id= $_SESSION['user_id'];?>
<br>

<div>
<?php
if(isset($_GET['hash']) && !empty($_GET['hash'])){
	$hash =$_GET['hash'];
	$message_query= $db->query("SELECT from_id, message FROM messages where group_hash='$hash'");
	while($run_message= mysqli_fetch_array($message_query)){
		$from_id= $run_message['from_id'];
		$message= $run_message['message'];

		$user_query= $db->query("SELECT uname from userdata where id='$from_id'");
		$run_user= mysqli_fetch_array($user_query);
		$from_username= $run_user['uname'];

	echo "<p><b>$from_username</b><br>$message</p>";

	}
?>
	<br>
	<form method='post'>
	<?php
		if(isset($_POST['message'])&& !empty($_POST['message'])){
			$new_message= $_POST['message'];
			$db->query("INSERT INTO messages VALUES ('', '$hash', '$my_id', '$new_message')");
			header('location:conversations.php?hash='.$hash);
		}
	?>
	Enter Message:<br>
	<textarea name="message" rows="7" cols="60"></textarea>
	<br><br>
	<input type="submit" value="send">
	</form>
<?php

}else{
	echo "<b>Select Conversation :</b>";
	$get_con=$db->query("SELECT hash, user_one, user_two FROM message_group WHERE user_one='$my_id' OR user_two='$my_id'");
	while($run_con= mysqli_fetch_array($get_con)){
		$hash= $run_con['hash'];
		$user_one= $run_con['user_one'];
		$user_two= $run_con['user_two'];

		if($user_one==$my_id){
			$select_id= $user_two;
		}else{
			$select_id= $user_one;
		}

		$user_get= $db-> query("SELECT uname FROM userdata WHERE id='$select_id'");
		$run_user= mysqli_fetch_array($user_get);
		$select_uname= $run_user['uname'];


	echo "<p><a href='conversations.php?hash=$hash'>$select_uname</a></p>";
	}
}

?>
</div>
</body>
</html>
