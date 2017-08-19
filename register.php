<?php
include('server.php');
?>
<html>
<head>
	<meta name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/style1.css">

	<link rel="shortcut icon" href="assets/images/ncu-formerly-itmu-logo-249x128.jpg" type="image/x-icon">
	<title>Sign Up</title>
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">


		<div class="input">
		<label>Username</label>
		<input type="text" name="uname" value=<?php echo $uname; ?>>
		<?php if(isset($errorUname)){ ?>
			<div class="error"><?php echo $errorUname; ?></div>
		<?php }?>
		</div>

		<div class="input">
		<label>First Name</label>
		<input type="text" name="fname" value=<?php echo $fname; ?>>
		<?php if(isset($errorFname)){ ?>
			<div class="error"><?php echo $errorFname; ?></div>
		<?php }?>
		</div>

		<div class="input">
		<label>Last Name</label>
		<input type="text" name="lname" value=<?php echo $lname; ?>>
		<?php if(isset($errorLname)){ ?>
			<div class="error"><?php echo $errorLname; ?></div>
		<?php }?>
		</div>

		<div class="input">
		<label>E-mail</label>
		<input type="text" name="email" value=<?php echo $email; ?>>
		<?php if(isset($errorEmail)){ ?>
			<div class="error"><?php echo $errorEmail; ?></div>
		<?php }?>
		</div>

		<div class="input">
		<label>Password</label>
		<input type="password" name="pswd">
		<?php if(isset($errorPswd)){ ?>
			<div class="error"><?php echo $errorPswd; ?></div>
		<?php }?>
		</div>

		<div class="input">
		<label>Confirm Password</label>
		<input type="password" name="cpswd">
		</div>

		<div class="form-group">
		<button type="submit" name="register" class="btn btn-primary">Register</button>
		</div>
		<p>
		Already a member? <a href="login.php">Login</a>
		</p>
	</form>
</body>
</html>
