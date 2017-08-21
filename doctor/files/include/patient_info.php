<?php
session_start();
require_once("../../database.php");
if(isset($_SESSION['patient_id']) && isset($_SESSION['appointment_id'])) {
	$patient_id=$_SESSION['patient_id'];
	$appointment_id=$_SESSION['appointment_id'];
	$sql="SELECT p.patient_name,p.dob,d.doctor_name,pa.date,pa.reason,pa.appointment_id from patient_registration p,patient_appointment pa,doctors d where d.doctor_id=pa.doctor_id and pa.patient_id=p.patient_id and p.patient_id='{$patient_id}' and pa.checkup_status=1 ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$send['name'][]=$row['patient_name'];
		$send['history'][]=$row	;
	}
print json_encode($send);
}
else{
	die();	
} 
?>