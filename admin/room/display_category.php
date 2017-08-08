
<?php
require_once("../../database.php");


$sql="select * from room_category";
	$res=mysqli_query($con,$sql) or die(mysqli_error($sql));
	$room=array();
	while ($row = mysqli_fetch_array($res)) {
	  $room[] = $row;
	}
	print json_encode($room);



?>