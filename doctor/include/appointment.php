<?php

session_start();
require_once("../../database.php");
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {
$doctor_id=$_SESSION['user_id'];
	$sql="SELECT pa.*,p.patient_name,d.time FROM patient_appointment pa,patient_registration p,doctor_slot d WHERE date >= CURDATE() and p.patient_id=pa.patient_id and pa.slot_id=d.slot_id and pa.doctor_id='{$doctor_id}' and pa.checkup_status=0";
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