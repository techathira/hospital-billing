<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$room_id=$data->room_id;

$sql="select * from room_category where room_id= '{$room_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$room=array();
$row = mysqli_fetch_array($res);
  $room['room_id'] = $row['room_id'];
  $room['room_name'] = $row['room_name'];
  $room['number_of_room'] = $row['number_of_room'];
  $room['floors'] = $row['floor'];
  $room['price'] = $row['price'];
  

print json_encode($room);
?>