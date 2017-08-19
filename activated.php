<?php
include ('server.php');

$email_code=trim($_GET['email_code']);
$query="SELECT * FROM `userdata` WHERE `email_code`='$email_code'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_assoc($result);
if($email_code==$row['email_code']){
if($row['active']==0){
  $query1="UPDATE `userdata` SET `active`=1 WHERE `email_code`='$email_code'";
  $result1=mysqli_query($db,$query1);
  if($result1){
  echo "Your account has been activated you can now login <a href='login.php'>Login</a>";
}else{
  echo "problem in activation";
}
}else{
  echo "already activated";
}
}else{
  echo "Something went wrong";
}

 ?>
