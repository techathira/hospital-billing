<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$name=$data->room_name;
$number_room=$data->number_of_room;
$price=$data->price;
$num=$data->floors;
$floors= "floor_".$num;

$sql="INSERT INTO room_category ( room_name,number_of_room,floor,price) values( '{$name}','{$number_room}','{$floors}','{$price}')";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

if($res)
{
	
	$last="SELECT * FROM room_category ORDER BY room_id DESC LIMIT 1";
	$last_res=mysqli_query($con,$last) or die(mysqli_error($con));
	$row1= mysqli_fetch_array($last_res);
	$room_id=$row1['room_id'];
	$room_name=$row1['room_name'];
	$number_of_room=$row1['number_of_room'];
	$floors=$row1['floor'];
	
	for($i=1;$i<=$number_of_room;$i++)
	{
		$ward_name=$room_name."_".$i;
		$sql1="insert into ward(room_id,ward_name) values('{$room_id}','{$ward_name}') ";
		$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
	}
	
	$sql2="select * from room_category";
	$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));
	$room=array();
	while ($row2 = mysqli_fetch_array($res2)) {
	  $room[] = $row2;
	}
	print json_encode($room);
}
else
{
	$send="Previus details not inserted!!";
	print json_encode($send);
}


?>



