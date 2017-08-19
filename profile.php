<?php
include ('server.php');
if (empty($_SESSION['uname'])){
header('location:login.php');
}
 ?>
<?php
  $uname=$_SESSION['uname'];
  $query="select * from userdata where uname='$uname'";
  $result=mysqli_query($db,$query);
  $row=mysqli_fetch_assoc($result);

  $fname=strtoupper($row['fname']);
  $lname=strtoupper($row['lname']);
  $email=$row['email'];

  $query1="select * from details where owner='$uname'";
  $result1=mysqli_query($db,$query1);
  if($result1){
  $count=mysqli_num_rows($result1);
  $row1=mysqli_fetch_assoc($result1);
  echo implode(' ::  ',$row1);

  echo $count;
}else{
  echo "No Ads yet";
  echo "<br> wanna try ? <a href='upload.php'>Click here</a>";
}
 ?>


<html>
<head>
  <title>My Profile</title>
  <link rel="stylesheet" href="assets/css/w3.css" >
</head>
<body>
  <ul class="w3-li">
    <li>FIRST NAME : <?php echo $fname;?></li>
    <li>LAST NAME : <?php echo $lname;?></li>
    <li>EMAIL : <?php echo $email;?></li>
  </ul>
</body>
</html>
