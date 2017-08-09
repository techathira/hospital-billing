<?php
require_once("../../database.php");

$sql="select * from services";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$service=array();
	while ($row = mysqli_fetch_array($res)) {
	  $service[] = $row;
	}
	print json_encode($service);


?>