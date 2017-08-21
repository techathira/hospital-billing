<?php
session_start();
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$patient_id = $data->patient_id;
$appointment_id = $data->appointment_id;
	$sql="SELECT IF(EXISTS(select pa.patient_id from patient_appointment pa where pa.patient_id='{$patient_id}' and pa.checkup_status=1), true , false) as result ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$row=mysqli_fetch_array($res);
	$send=(int)$row['result'];
	if($send==1){
	$_SESSION['patient_id']=$patient_id;
	$_SESSION['appointment_id']=$appointment_id;
	}
print json_encode($send);

?>