<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->id;

$sql="delete from patient_registration where patient_id= '{$patient_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

	if($res)
	{
		$sql="select * from patient_registration ";
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
		$send=array();
		while(mysqli_fetch_array($sql)){
			$send[]=$row;
		}
		print json_encode($res);
	}
?>