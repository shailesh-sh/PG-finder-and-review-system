<?php
include ('server.php');
$uname=$_SESSION['uname'];
$query="SELECT * FROM `details` WHERE owner='$uname'";
$result= searchTable($query);

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
<link rel="stylesheet" href="assets/css/w3.css">
 <div style="overflow-x:auto;">
 <table class="w3-table w3-striped">
 <tr>
   <th>Pics</th>
   <th>Owner</th>
   <th>1 person Rooms</th>
   <th>Rent</th>
   <th>2 person Rooms</th>
   <th>Rent</th>
   <th>3 person rooms</th>
   <th>Rent</th>
   <th>Landmark /Address</th>
   <th>Edit</th>
 </tr>
 <?php while($row= mysqli_fetch_array($result)): ?>
   <tr>
     <td><?php echo "<div id='img_div'>";
     echo "<img src='pic/".$row['pic']."' alt='NO Image Available'>";
     echo "</div>";?></td>
     <td><?php echo $row['owner']; ?></td>
     <td><?php echo $row['single']; ?></td>
     <td><?php echo $row['rent_single']; ?></td>
     <td><?php echo $row['doubler']; ?></td>
     <td><?php echo $row['rent_doubler']; ?></td>
     <td><?php echo $row['triple']; ?></td>
     <td><?php echo $row['rent_triple']; ?></td>
     <td><?php echo $row['Address']; ?></td>
     <td><a href='edit.php'>Edit</a></td>
   </tr>
 <?php endwhile; ?>
 </table>
 </div>
