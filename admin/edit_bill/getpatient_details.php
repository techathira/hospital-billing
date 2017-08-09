<?php
require_once("../../database.php");
header("Content-type: image/png");
$data = json_decode(file_get_contents("php://input"));

$patient_id=$data->patient_id;

$sql="select * from patient_registration where patient_id='{$patient_id}'";

$res_patient=mysqli_query($con,$sql) or die(mysqli_error($con));

$send=array();
$row_patient=mysqli_fetch_array($res_patient);

				$send['patient_id']=$row_patient['patient_id'];
				
				$send['patient_name']=$row_patient['patient_name'];
				$send['phone']=$row_patient['phone'];
				$send['barcode']=$row_patient['barcode_reader'];
				$send['age']=$row_patient['age'];
				$send['gender']=$row_patient['gender'];
				
	
	print json_encode($send);	
?>
	