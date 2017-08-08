<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$room_id=$data->room_id;

$price=$data->price;

$sql="update room_category set price='{$price}' where room_id='{$room_id}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

if($res)
{
	$sql="select * from room_category";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$room=array();
	while ($row = mysqli_fetch_array($res)) {
	  $room[] = $row;
	}
	print json_encode($room);
}
else
{
	$send="Previus details not Updated!!";
	print json_encode($send);
}
?>