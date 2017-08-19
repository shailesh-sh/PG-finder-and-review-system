
	<?php

	if(isset($_POST['search'])){
		$searchStr= $_POST['searchStr'];
		$query="SELECT * FROM `Rent` WHERE type='$searchStr'";
		$result= searchTable($query);	
	}
	else if(isset($_POST['searchOwner'])){
		$searchStr= $_POST['searchStr'];
		$query="SELECT * FROM `Rent` WHERE owner Like '%$searchStr%'";
		$result= searchTable($query);	
	}
	else{
		$query= "SELECT * FROM Rent";
		$result= searchTable($query);
	}
	
	function searchTable($query){
		$db=mysqli_connect("localhost","root","","pg");
		$searchResult=mysqli_query($db, $query);
		if (!$searchResult ) {
    		printf("Error: %s\n", mysqli_error($db));
    		exit();
		}
		return $searchResult;
	}
	?>
	
	<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to PG Finder</title>
	<link rel="stylesheet" href="assets/css/style2.css">
	<link rel="stylesheet" href="assets/css/w3.css">
</head>
<body>
	<div class="form">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<div class="input">
		<input type="text" name="searchStr" placeholder="Search here ....."><br><br>
		</div>
		<div class="button">
		<input type="submit" name="search" value="search">
		<input type="submit" name="searchOwner" value="search owner"><br><br>
		</div>
		<table class="w3-table w3-striped">
		<tr>
			<th>Owner</th>
			<th>Type</th>
			<th>Rent</th>
		</tr>
		<?php while($row= mysqli_fetch_array($result)): ?>
			<tr>
				<td><?php echo $row['owner']; ?></td>
				<td><?php echo $row['type']; ?></td>
				<td><?php echo $row['rent']; ?></td>
				</tr>
		<?php endwhile; ?>
		</table>
			</form>
	</div>
	</body>
	</html>

