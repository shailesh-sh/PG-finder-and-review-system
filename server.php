<?php
include('mail.php');
	session_start();

	$uname="";
	$fname="";
	$lname="";
	$email="";
	$error=false;

	$db=mysqli_connect('localhost','root','','pg');

	if(isset($_POST['register'])){
			$uname= $_POST['uname'];
			$uname = strip_tags($uname);
			$uname = htmlspecialchars($uname);

			$fname= $_POST['fname'];
			$fname = strip_tags($fname);
			$fname = htmlspecialchars($fname);

			$lname= $_POST['lname'];
			$lname = strip_tags($lname);
			$lname = htmlspecialchars($lname);

			$email = $_POST['email'];
			$email = strip_tags($email);
			$email = htmlspecialchars($email);

			$pswd = $_POST['pswd'];
			$pswd = strip_tags($pswd);
			$pswd = htmlspecialchars($pswd);

			$cpswd= $_POST['cpswd'];
			$cpswd= strip_tags($cpswd);
			$cpswd= htmlspecialchars($cpswd);

			$usercheck=mysqli_query($db,"SELECT uname FROM userdata WHERE uname='$uname'");
			$userchecker=mysqli_num_rows($usercheck);
			$emailcheck=mysqli_query($db,"SELECT email FROM userdata WHERE email='$email'");
			$emailchecker=mysqli_num_rows($emailcheck);

			if(empty($uname)){
				$error = true;
				$errorUname = 'Please input username';
			}elseif($userchecker>0){
							$error=true;
							$errorUname="Username already in use!!";
						}

			if(empty($fname)){
				$error = true;
				$errorFname = 'Please input firstname';
			}

			if(empty($lname)){
				$error = true;
				$errorLname = 'Please input lastname';
			}

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$error = true;
				$errorEmail = 'Please a valid input email';
			}elseif($emailchecker>0){
							$error=true;
							$errorEmail="Email already in use!!";
						}

			if(empty($pswd)){
				$error = true;
				$errorPswd = 'Please input password';
			}elseif(strlen($pswd) < 6 && strlen($pswd)>30){
				$error = true;
				$errorPswd = 'Password must at least 6 characters';
			}elseif($pswd!=$cpswd){
				$error=true;
				$errorPswd='Password mismatch';
			}



		if(!$error){
			$pswd=md5($pswd);
			$email_code=md5($email + microtime());
			$sql="INSERT INTO userdata(id,uname, fname, lname,email,email_code, pswd)
						VALUES ('', '$uname','$fname','$lname','$email', '$email_code','$pswd')";
			mysqli_query($db,$sql);
			$mail=substr(strrchr($email, "@"), 1);
			if($mail=='ncuindia.edu'){
			mail::sendMail("Welcome to PG Finder", "Hello $uname\n\n<h3>Click on the link below to activate your account </h3>\n\n<a href='http://localhost/pg/activated.php?email_code=$email_code'>http://localhost/pg/activated.php?email_code=$email_code</a> ",$email);
			header('location: activate.php'); 				//for students
		}else{
			$_SESSION['uname']=$uname;
			$_SESSION['success']="Logging You In";
			header('location: owner.php');					//for owners
		}
		}
	}

	if(isset($_POST['Login'])){

	    $uname = trim($_POST['uname']);
		$uname = htmlspecialchars(strip_tags($uname));

		$pswd = trim($_POST['pswd']);
		$pswd = htmlspecialchars(strip_tags($pswd));

		if(empty($uname)){
			$error=true;
			$errorUname='Please input username';
		}

		if(empty($pswd)){
			$error=true;
			$errorPswd='Please input password';
		}
		if(!$error){
			$pswd=md5($pswd);
			$query="SELECT * FROM userdata WHERE uname='$uname'";
			$result=mysqli_query($db,$query);
			$count=mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
			if($count==1 && $row['pswd'] == $pswd){
				$mail=$row['email'];
				$mail=substr(strrchr($mail, "@"), 1);
				if($mail=='ncuindia.edu'&& $row['active']==1){
				$_SESSION['uname'] = $row['uname'];
				$_SESSION['user_id']= $row['id'];
				header('location: index.php');										//for students who have activated their account
			}else if($mail=='ncuindia.edu'&& $row['active']==0){
				header('location: activate.php');								//for students who haven't activated their account yet
			}else{
				$_SESSION['uname'] = $row['uname'];
				$_SESSION['user_id']= $row['id'];
				header('location: owner.php');											//for owners
			}
			}
		    else{
				$errorLogin="Wrong Credentials";
			}


		}
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['uname']);
		header('location: login.php');
	}
?>
