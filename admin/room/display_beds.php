<?php
require_once("../../database.php");

$data = json_decode(file_get_contents("php://input"));
$room_id=$data->room_id;

$sql="select * from ward where room_id='{$room_id}'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($sql));
	$beds=array();
	while ($row = mysqli_fetch_array($res)) {
	  $beds[] = $row;
	}
	print json_encode($beds);



?>