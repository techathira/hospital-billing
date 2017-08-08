<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

for($i=0;$i<sizeof($data);$i++)
{
$service_name[]=$data[$i]->service_name;
$price[]=$data[$i]->price;





$sql="INSERT INTO services (service_name, price) values( '{$service_name[$i]}','{$price[$i]}')";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
}
if($res)
{
	$sql="select * from services";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$service=array();
	while ($row = mysqli_fetch_array($res)) {
	  $service[] = $row;
	}
	print json_encode($service);
}
else
{
	$send="Previus details not inserted!!";
	print json_encode($service);
}


?>

