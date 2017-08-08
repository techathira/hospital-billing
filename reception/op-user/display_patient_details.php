<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$id=$data->patient_id;
$send=array();
$sql1="select * from patient_registration where patient_id = '{$id}' or phone= '{$id}'  ";
$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
$row1= mysqli_fetch_array($res1);
	$send['patient_id']=$row1['patient_id'];
	$send['patient_name']=$row1['patient_name'];
	$send['address']=$row1['address'];
	$send['phone']=$row1['phone'];
	$send['dob']=$row1['dob'];
	$send['email']=$row1['email'];
	$send['age']=$row1['age'];
	$send['gender']=$row1['gender'];
	
	

   print json_encode($send);


   


?>