<?php include('server.php');

	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}

?>
<html>
<head>
	<meta name="viewport" content="width=device-width, intial-scale=1">	
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="shortcut icon" href="ncu-formerly-itmu-logo-249x128.jpg" type="image/x-icon">
	<title>Home Page</title>
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	
	<div class="content">
		<?php if (isset($_SESSION['success']));?>
			<div class="error success">
				<h3>
					<?php 
					echo ('Login Successful');
					?>
				</h3>
			</div>
		
		
		<?php if (isset($_SESSION['uname']));?>
			<p>Welcome <strong><?php echo $_SESSION['uname']; ?></strong></p>
			<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
		
	</div>
</body>
</html>