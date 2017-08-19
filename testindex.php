<?php include('server.php');

	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}

?>
<?php include('search.php');?>


<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to PG Finder</title>
	<link rel="stylesheet" href="style1.css">
	<link rel="stylesheet" href="w3.css">
</head>
<body>
	<div class="form">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<div class="input">
		<input type="text" name="searchStr" placeholder="Search here ....."><br><br>
		</div>
		<div class="button">
		<input type="submit" name="search" value="search"><br><br>
		</div>
		<table class="w3-table w3-striped">
		<tr>
			<th>Pics</th>
			<th>Owner</th>
			<th>1 person Rooms</th>
			<th>2 person Rooms</th>
			<th>3 person rooms</th>
			<th>Address</th>
			<th>Contact No.</th>
			<th>Description</th>
		</tr>
		<?php while($row= mysqli_fetch_array($result)): ?>
			<tr>
				<td><?php echo "<div id='img_div'>"; 
				echo "<img src='pic/".$row['pic']."'>"; 
				echo "</div>";?></td>
				<td><?php echo $row['owner']; ?></td>
				<td><?php echo $row['single']; ?></td>
				<td><?php echo $row['doubler']; ?></td>
				<td><?php echo $row['triple']; ?></td>
				<td><?php echo $row['Address']; ?></td>
				<td><?php echo $row['contact']; ?></td>
				<td><?php echo $row['description']; ?></td>
			</tr>
		<?php endwhile; ?>
		</table>
	</form>
	</div>
</body>
</html>