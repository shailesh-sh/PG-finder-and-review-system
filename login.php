<?php include('server.php');?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/style1.css">

	<link rel="shortcut icon" href="ncu-formerly-itmu-logo-249x128.jpg" type="image/x-icon">
	<title>Login</title>
</head>
<body>
	<div class="header">
		<h2>Login</h2>
		<?php if(isset($errorLogin)){ ?>
		<div class="error"><?php echo $errorLogin; ?></div>
		<?php }?>
	</div>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<div class="input">
		<label>Username</label>
		<input type="text" name="uname">
		<?php if(isset($errorUname)){ ?>
		<div class="error"><?php echo $errorUname; ?></div>
		<?php }?>
		</div>

		<div class="input">
		<label>Password</label>
		<input type="password" name="pswd">
		<?php if(isset($errorPswd)){ ?>
		<div class="error"><?php echo $errorPswd; ?></div>
		<?php }?>
		</div>


		<div class="form-group">
		<button type="submit" name="Login" class="btn btn-primary">Login</button>
		</div>
		<p>
		Need an account? <a href="register.php">Register here</a><br>
		Forgot password <a href="forgotpass.php">Click here</a>
		</p>
	</form>
</body>
</html>
