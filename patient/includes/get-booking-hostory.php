<?php 
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="patient")
{
	$user_id=$_SESSION['user_id'];
}
else{
	header('Location: ../../login/index.html');
	die();
	
}

require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$sql="SELECT pa.appointment_id, pa.date, dc.doctor_name ,dc.doctor_id,pa.checkup_status,ds.time,pa.reason FROM patient_appointment pa, doctors dc, doctor_slot ds where dc.doctor_id = pa.doctor_id and ds.slot_id = pa.slot_id and  pa.patient_id='{$user_id}' ORDER BY pa.checkup_status";

$history=[];
$result = mysqli_query($con, $sql )or die(mysqli_error($con));
if(mysqli_num_rows($result)>=1){

	while ($row = mysqli_fetch_array($result)) {
    	$history[] = $row;
	}	
    print json_encode($history);
}

