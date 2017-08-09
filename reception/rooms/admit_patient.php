<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$ward_id=$data->ward_id;
$room_id=$data->room_id;
$bed_id=$data->bed_id;
$sql="select * from beds b,ward w,room_category rc where rc.room_id=w.room_id and w.ward_id=b.ward_id and w.ward_id='{$ward_id}' and rc.room_id='{$room_id}' and b.bed_id='{$bed_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$admit=array();
   $row = mysqli_fetch_array($res);
	  $admit['room_name'] = $row['room_name'];
	  $admit['room_id'] = $row['room_id'];
	  $admit['bed_id'] = $row['bed_id'];
	  $admit['ward_name'] = $row['ward_name'];
	  $admit['price'] = $row['price'];
	  $admit['ward_id'] = $row['ward_id'];
	  
	
	print json_encode($admit);

?>