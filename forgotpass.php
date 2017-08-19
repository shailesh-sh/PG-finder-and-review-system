<?php
include('server.php');

if(isset($_POST['submit'])){
	$email=$_POST['email'];
	if(empty($_POST['email'])){
		$error=true;
		$errorEmail="Field cannot be left empty";
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		$errorEmail = 'Please a valid input email';
	}
	
	
	
if(!$error){	
$query="SELECT * from userdata where `email`='$email'";
$result=mysqli_query($db, $query);
if($result){
$row=mysqli_fetch_assoc($result);
$email_code=$row['email_code'];
$uname=$row['uname'];
if($email==$row['email']){
mail::sendMail("Change Password", "Hello $uname\n\n<h3>Click on the link below to change your password </h3>\n\n<a href='http://localhost/pg/forgotchangepass.php?email_code=$email_code'>http://localhost/pg/activated.php?email_code=$email_code</a> ",$email);
$sent="Mail has been sent to your email. You can change the password from there";
}else{
	$errorEmail="This mail isn't registered yet";
}
}
}
}


 
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/style.css">
  	<link rel="stylesheet" href="assets/css/style1.css">
  	<link rel="shortcut icon" href="ncu-formerly-itmu-logo-249x128.jpg" type="image/x-icon">
	<title>Forgot Password</title>
  	<link rel="shortcut icon" href="assets/images/ncu-formerly-itmu-logo-249x128.jpg" type="image/x-icon">
</head>
<body>
	<div class="header">
		<h2>Forgot Password</h2>
	</div>
	<form method="post">
		E-mail :<br>
		<input type="text" name="email" placeholder="Enter registered e-mail">
		<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</div>
		<?php if(isset($errorEmail)){?><div class="error"><?php  echo $errorEmail?> </div><?php } ?>
		<?php if(isset($sent)){?><div class="error success"><?php  echo $sent?> </div><?php } ?>
	</form>
</body>
</html>
