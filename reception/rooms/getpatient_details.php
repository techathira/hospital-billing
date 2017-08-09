<?php
require_once("../../database.php");
header("Content-type: image/png");
$data = json_decode(file_get_contents("php://input"));

$patient_id=$data->patient_id;

$sql="SELECT patient_registration.*,date_format( beds_allotment.from_date, '%d-%m-%Y' ) AS date_of_admission,beds_allotment.bed_id,ward.ward_name FROM patient_registration,beds_allotment,ward WHERE patient_registration.patient_id='{$patient_id}' AND patient_registration.patient_id=beds_allotment.patient_id AND beds_allotment.ward_id=ward.ward_id AND beds_allotment.flag=0";
$res_patient=mysqli_query($con,$sql) or die(mysqli_error($con));

$send=array();
$row_patient=mysqli_fetch_array($res_patient);

				$send['patient_id']=$row_patient['patient_id'];
				$send['address']=$row_patient['address'];
				$send['date_of_admission']=$row_patient['date_of_admission'];
				$send['ward_name']=$row_patient['ward_name'];
				$send['bed_id']=$row_patient['bed_id'];
				$send['patient_name']=$row_patient['patient_name'];
				$send['phone']=$row_patient['phone'];
				$send['barcode']=$row_patient['barcode_reader'];
				$send['age']=$row_patient['age'];
				$send['gender']=$row_patient['gender'];
				
	
	print json_encode($send);	
?>
	