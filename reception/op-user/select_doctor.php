<?php
	require_once("../../database.php");
	$data = json_decode(file_get_contents("php://input"));
	$patient_id=$data->patient_id;
	$doctor_id=$data->doctor_id;
    

	$sql="select p.*, d.doctor_id,d.doctor_name,d.fee from patient_registration p,doctors d WHERE d.doctor_id='{$doctor_id}' and p.patient_id ='{$patient_id}' or d.doctor_id='{$doctor_id}' and p.phone = '{$patient_id}' or d.doctor_id='{$doctor_id}' and p.email = '{$patient_id}' ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	
		if($res) {
		
		$send=array();
		$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
		
				$send['patient_id']=$row['patient_id'];
				$send['age']=$row['age'];
				$send['doctor_id']=$row['doctor_id'];
				$send['doctor_name']=$row['doctor_name'];
				$send['patient_name']=$row['patient_name'];
				$send['fee']=$row['fee'];
				$send['age']=$row['age'];
				print json_encode($send);
		
		
		}
	
   



?>

