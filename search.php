
	<?php
	$chk="";
  	if(isset($_POST['search'])){
		if(isset($_POST['searchStr'])&&!empty($_POST['searchStr'])){
		$searchStr= $_POST['searchStr'];
		$query="SELECT * FROM `details` WHERE CONCAT (`id`, `owner`, `single`, `rent_single`, `doubler`, `rent_doubler`, `triple`, `rent_triple`, `Address`) LIKE '%$searchStr%'";
		$result= searchTable($query);
	}else if(isset($_POST['techno'])){
		$checkbox1=$_POST['techno'];
		foreach($checkbox1 as $chk1)
		   {
		      $chk .= $chk1.",";
		   }
		$query="SELECT * FROM `details` WHERE `facilities`='$chk'";
		$result=searchTable($query);
		 }
	}
	else{
		$query= "SELECT * FROM details";
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
