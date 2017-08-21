<?php
session_start();
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
if(isset($data->patient_id) && isset($data->appointment_id)){
	$_SESSION['patient_id']=$data->patient_id;
	$_SESSION['appointment_id']=$data->appointment_id;
}
else if(isset($_SESSION['patient_id'])){
	$patient_id=$_SESSION['patient_id'];
	$sql="select * from patient_registration where patient_id='{$patient_id}' ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	$send['patient_details'][]=$row;
	$send['appointment_id'][]=$_SESSION['appointment_id'];
	print json_encode($send);
}
else {
die();
}


?>