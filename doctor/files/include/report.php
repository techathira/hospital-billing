<?php
session_start();
require_once("../../database.php");
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {
$doctor_id=$_SESSION['user_id'];
	$sql="SELECT pa.*,DATE_FORMAT(pa.date,'%d-%M-%Y') as date,p.patient_name FROM patient_appointment pa,patient_registration p,doctors d WHERE  p.patient_id=pa.patient_id and pa.doctor_id=d.doctor_id and pa.doctor_id='{$doctor_id}' and pa.checkup_status=1";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	$send=array();
	while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$send[]=$row;
	}
print json_encode($send);
}
else{
	die();	
} 
?>