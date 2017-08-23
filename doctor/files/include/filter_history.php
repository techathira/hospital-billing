<?php
session_start();
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
if(isset($_SESSION['patient_id']) && isset($_SESSION['appointment_id'])) {
	$patient_id=$_SESSION['patient_id'];
$from_date=$data->from_date;
$to_date=$data->to_date;

$sql="SELECT p.patient_name,p.dob,d.doctor_name,DATE_FORMAT(date,'%d-%M-%Y') as date,pa.reason,pa.appointment_id from patient_registration p,patient_appointment pa,doctors d where d.doctor_id=pa.doctor_id and date BETWEEN '{$from_date}' AND '{$to_date}' and pa.patient_id=p.patient_id and p.patient_id='{$patient_id}' and pa.checkup_status=1";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$send[]=$row;
	}
print json_encode($send);
}else{
	die();	
}
?>