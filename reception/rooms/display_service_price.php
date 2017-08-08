<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$service_id=$data->service_id;

$sql="select * from services where service_id='{$service_id}'";
$data=array();
$result = mysqli_query($con, $sql )or die(mysqli_error($con));
$row=mysqli_fetch_array($result);

	$data['price']=$row['price'];	

print json_encode($data);
?>
