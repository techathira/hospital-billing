<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
	$phone=$data->phone;
	$doctor_id=$data->doctor_id;
	$sql="update doctors set phone= '{$phone}' where doctor_id= '{$doctor_id}' ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	require_once("profile_details.php");
//print json_encode($send);
?>