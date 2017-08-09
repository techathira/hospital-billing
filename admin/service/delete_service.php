<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$service_id=$data->service_id;

$sql="delete from services where service_id= '{$service_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$sql="select * from services";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$service=array();
	while ($row = mysqli_fetch_array($res)) {
	  $service[] = $row;
	}
	print json_encode($service);
?>
