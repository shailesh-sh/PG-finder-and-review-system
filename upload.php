<?php include('server.php');

	if(empty($_SESSION['uname'])){
		header('location: login.php');
	}

?>
<?php
$msg="";
	if(isset($_POST['upload'])){
		$owner=$_POST['owner'];
		$usercheck=mysqli_query($db,"SELECT owner FROM details WHERE owner='$owner'");
		$userchecker=mysqli_num_rows($usercheck);
		
		if(empty($_POST['owner'])){
			$error="true";
			$errorOwner="You already have posted an Ad First delete it to post again";
		}elseif($userchecker>0){
				$error=true;
				$errorOwner="Username already in use!!";
			}
		
		
		if(empty($_POST['single'])&&$_POST['single']!=0){
			$error=true;
			$errorSingle="Please provide Value, 0 if not available";
		}else if(!is_numeric($_POST['single'])){
			$error=true;
			$errorSingle="Should be numeric";
		}
		
		if(empty($_POST['double'])&&$_POST['double']!=0){
			$error=true;
			$errorDouble="Please provide Value, 0 if not available";
		}else if(!is_numeric($_POST['double'])){
			$error=true;
			$errorDouble="Should be numeric";
		}
		
		if(empty($_POST['triple'])&&$_POST['triple']!=0){
			$error=true;
			$errorTriple="Please provide Value, 0 if not available";
		}else if(!is_numeric($_POST['triple'])){
			$error=true;
			$errorTriple="Should be numeric";
		}
		
		if(empty($_POST['rent_single'])&&$_POST['rent_single']!=0){
			$error=true;
			$errorRentSingle="Please provide Value, 0 if not available";
		}else if(!is_numeric($_POST['rent_single'])){
			$error=true;
			$errorRentSingle="Should be numeric";
		}
		
		if(empty($_POST['rent_doubler'])&&$_POST['rent_doubler']!=0){
			$error=true;
			$errorRentDouble="Please provide Value, 0 if not available";
		}else if(!is_numeric($_POST['rent_doubler'])){
			$error=true;
			$errorRentDouble="Should be numeric";
		}
		
		if(empty($_POST['rent_triple'])&&$_POST['rent_triple']!=0){
			$error=true;
			$errorRentTriple="Please provide Value, 0 if not available";
		}else if(!is_numeric($_POST['rent_triple'])){
			$error=true;
			$errorRentTriple="Should be numeric";
		}
		
		
		if(empty($_POST['Address'])){
			$error=true;
			$errorAddress="Please enter Landmark";
		}
		
		if(empty($_POST['contact'])&&$_POST['contact']!=0){
			$error=true;
			$errorContact="Please enter valid number";
		}else if(!is_numeric($_POST['contact'])){
			$error=true;
			$errorContact="Please enter valid number";
		}
		
		if(!$error){
		$target= "pic/".basename($_FILES['pic']['name']);
		$db= mysqli_connect("localhost","root","","pg");
		$pic= $_FILES['pic']['name'];
		$owner=$_POST['owner'];
		$single=$_POST['single'];
		$rent_single=$_POST['rent_single'];
		$double=$_POST['double'];
		$rent_doubler=$_POST['rent_doubler'];
		$triple=$_POST['triple'];
		$rent_triple=$_POST['rent_triple'];
		$Address=$_POST['Address'];
		$contact=$_POST['contact'];
		$description=$_POST['description'];



		$occ="";
		if(isset($_POST['occupacancy'])){
		$checkbox2=$_POST['occupacancy'];			
		foreach($checkbox2 as $occ1)  
		   {  
		      $occ .= $occ1.",";  
		   }  
		}



		if(isset($_POST['type'])){
			$type=$_POST['type'];
		}	
		



		
		$chk="";
		if(isset($_POST['techno'])){
		$checkbox1=$_POST['techno'];			
		foreach($checkbox1 as $chk1)  
		   {  
		      $chk .= $chk1.",";  
		   }  
		}
		

		$query= "INSERT INTO `details`(`id`, `pic`, `owner`, `single`, `rent_single`, `doubler`, `rent_doubler`, `triple`, `rent_triple`, `Address`, `contact`, `description`, `facilities`, `type`, `occupancy`) VALUES ('', '$pic', '$owner', '$single', '$rent_single', '$double', '$rent_doubler', '$triple', '$rent_triple', '$Address', '$contact', '$description', '$chk', '$type', '$occ')";
		$result=mysqli_query($db, $query);
		move_uploaded_file($_FILES['pic']['tmp_name'],$target);
		
		
		if($result==1)  
		   {  
		      echo'<script>alert("Inserted Successfully")</script>';  
		   }  
		else  
		   {  
		      echo'<script>alert("Failed To Insert")</script>';  
		   }  
	}
	}
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" href="assets/css/uploadcss.css">
	<link rel="stylesheet" href="assets/css/style1.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="header">
		<h2>Upload</h2>
	</div>
	<form method="post" action="<?php echo ($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
	<input type="hidden" name="size" value="1000000">
	<label><strong>Image</strong></label><br>
	<input type="file" name="pic"><br><br>
	
	<label><strong>Owner's Name</strong></label><br>
	<input type="text" name="owner"><?php if(isset($errorOwner)){ ?>
	<div class="error"><?php echo $errorOwner; ?></div>
		<?php }?><br><br>
	
	
	<! type of pg>
	
	
	<label><strong>Type</strong></label><br>
	<input type="radio" name="type" value="boys">Boys
	<input type="radio" name="type" value="girls">Girls<br><br>
	
	
	
	<! type of occupancy>
	
	
	
    <label><strong>Select types of occupacancy available:</strong></label>
   <div style="width:200px;border-radius:6px;margin:0px auto">  
<table border="1">  
   <tr>  
      <td>Single</td>  
      <td><input type="checkbox" name="occupacancy[]" value="single"></td>  
   </tr>  
   <tr>  
      <td>Double</td>  
      <td><input type="checkbox" name="occupacancy[]" value="double"></td>  
   </tr>  
   <tr>  
      <td>Triple or more</td>  
      <td><input type="checkbox" name="occupacancy[]" value="triple"></td>  
   </tr>  
</table>  
</div><br><br>


<!details>


	<label><strong>No. of single person rooms available</strong></label><br>
	<input type="text" name="single"><?php if(isset($errorSingle)){ ?>
	<div class="error"><?php echo $errorSingle; ?></div>
		<?php }?><br><br>
	<label><strong>Rent for one person room (per month)</strong></label><br>
	<input type="text" name="rent_single"><?php if(isset($errorRentSingle)){ ?>
	<div class="error"><?php echo $errorRentSingle; ?></div>
		<?php }?><br><br>
	<label><strong>No. of double person rooms available</strong></label><br>
	<input type="text" name="double"><?php if(isset($errorDouble)){ ?>
	<div class="error"><?php echo $errorDouble; ?></div>
		<?php }?><br><br>
	<label><strong>Rent for two person room (per month)</strong></label><br>
	<input type="text" name="rent_doubler"><?php if(isset($errorRentDouble)){ ?>
	<div class="error"><?php echo $errorRentDouble; ?></div>
		<?php }?><br><br>
	<label><strong>No. of triple person rooms available</strong></label><br>
	<input type="text" name="triple"><?php if(isset($errorTriple)){ ?>
	<div class="error"><?php echo $errorTriple; ?></div>
		<?php }?><br><br>
	<label><strong>Rent for three person room (per month)</strong></label><br>
	<input type="text" name="rent_triple"><?php if(isset($errorRentTriple)){ ?>
	<div class="error"><?php echo $errorRentTriple; ?></div>
		<?php }?><br><br>
	<label><strong>Address/Landmark</strong></label><br>
	<textarea name="Address" cols="40" rows="4"></textarea><?php if(isset($errorAddress)){ ?>
	<div class="error"><?php echo $errorAddress; ?></div>
		<?php }?><br><br>
	<label><strong>Contact No.</strong></label><br>
	<input type="text" name="contact"><?php if(isset($errorContact)){ ?>
	<div class="error"><?php echo $errorContact; ?></div>
		<?php }?><br><br>
	<label><strong>Description</strong></label><br>
	<textarea name="description" cols="40" rows="4"></textarea><br><br>
	<br><br>  
   
  <! Facilities of pg>
  

  <label><strong>Select if these facilities are available</strong></label><br>   
<div style="width:200px;border-radius:6px;margin:0px auto">

   <table border="1">
   <tr>  
      <td>2 time Food</td>  
      <td><input type="checkbox" name="techno[]" value="2 time Food"></td>  
   </tr>
   <tr>  
      <td>3 time food</td>  
      <td><input type="checkbox" name="techno[]" value="3 time Food"></td>  
   </tr>   
   <tr>  
      <td>Laundry</td>  
      <td><input type="checkbox" name="techno[]" value="Laundry"></td>  
   </tr>  
   <tr>  
      <td>WiFi</td>  
      <td><input type="checkbox" name="techno[]" value="WiFi"></td>  
   </tr>  
   <tr>  
      <td>AC</td>  
      <td><input type="checkbox" name="techno[]" value="AC"></td>  
   </tr>
   <tr>  
      <td>RO</td>  
      <td><input type="checkbox" name="techno[]" value="RO"></td>  
   </tr>
   <tr>  
      <td>TV</td>  
      <td><input type="checkbox" name="techno[]" value="TV"></td>  
   </tr>
   <tr>  
      <td>Power Backup</td>  
      <td><input type="checkbox" name="techno[]" value="Power Backup"></td>  
   </tr>
   <tr>  
      <td>Maid/Cleaning</td>  
      <td><input type="checkbox" name="techno[]" value="maid/cleaning"></td>  
   </tr>
   <tr>  
      <td colspan="2" align="center"><input type="submit" class="button" name="upload"></td>  
   </tr>  
</table>  
</div>  
</form>    
</body>
	<a href="owner.php" class="button">Back to home page</a>
</body>
</html>