<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$service_id=$data->service_id;
$price=$data->price;
if($price=="")
{
	$amount=0;
}
else{
	$amount=$price;
}

$sql="update services set price='{$amount}' where service_id='{$service_id}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

if($res)
{
	$sql="select * from services";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$services=array();
	while ($row = mysqli_fetch_array($res)) {
	  $services[] = $row;
	}
	print json_encode($services);
}
else
{
	$send="Previus details not Updated!!";
	print json_encode($send);
}
?>