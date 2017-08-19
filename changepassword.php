<?php include ('server.php');

if(empty($_SESSION['uname'])){
  header('location: login.php');
}
?>

<?php
if(isset($_POST['change'])){
  if (isset($_SESSION['uname'])){
    $uname= $_SESSION['uname'];
    $query="SELECT `pswd` FROM `userdata` WHERE `uname`='$uname'";
    $result=mysqli_query($db,$query);
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    $old=$_POST['old'];
    $new1=$_POST['new1'];
    $new2=$_POST['new2'];
    $pswd=md5($new1);
    if(md5($old)==$row['pswd']){
      if($new1==$new2){
        if(strlen($new1) >=6 && strlen($new1)<31){
          $change="UPDATE `userdata` SET `pswd`='$pswd' where uname='$uname'";
          mysqli_query($db,$change);
          $success="password updated successfully";
        }else{
          $errorlenpassword="Password should be of atleast 6 characters";
        }
      }else{
        $errornewpassword="Password mismatch";
      }
    }else{
      $errorpassword="Old Password entered is wrong";
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
  <title>Change Password</title>
</head>
<div class="header">
	<h2>Change Password</h2>
</div>
<form action="changepassword.php" method="post">
Old password<br>
<input type="password" name="old" placeholder="Enter old password"><?php if(isset($errorpassword)){?><div class=error><?php  echo $errorpassword?> </div><?php } ?><br><br>
New password<br>
<input type="password" name="new1" placeholder="Enter new password"><?php if(isset($errorlenpassword)){?><div class=error><?php  echo $errorlenpassword?> </div><?php } ?><br><br>
Confirm password<br>
<input type="password" name="new2" placeholder="Enter again"><?php if(isset($errornewpassword)){?><div class=error><?php  echo $errornewpassword?> </div><?php } ?><br><br>

<div class="form-group">
	<button type="submit" name="change" class="btn btn-primary">Submit</button>
</div>
<?php if(isset($success)){?><div class="error success"><?php  echo $success?> </div><?php } ?>

</form>
</html>
