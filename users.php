<?php
 function user_active($uname){
 	$uname = sanitize($uname);
	return(mysqli_result(mysql_query("Select count(`id`) from userdata where uname='$uname' and acive=1"),0)==1)?true:false;
 }
?>