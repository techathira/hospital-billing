<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$room_id=$data->room_id;

$sql="delete from room_category where room_id= '{$room_id}' ";
$sql1="delete from ward where room_id= '{$room_id}' ";

$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
	
	$sql="select * from room_category";
	$res=mysqli_query($con,$sql) or die(mysqli_error($sql));
	$room=array();
	while ($row = mysqli_fetch_array($res)) {
	  $room[] = $row;
	}
	print json_encode($room);
?>
