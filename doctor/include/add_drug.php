<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
	$drug_name=$data->drug_name;
	
	$sql="insert into prescription(name) values('{$drug_name}') ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	if(mysqli_affected_rows($con)>=1){
		print json_encode(1);
	} else{
		print json_encode(0);
	}
//print json_encode($send);
?>