<?php

require_once("../../database.php");
$data1 = json_decode(file_get_contents("php://input"));

$bill_no=$data1->lab_billno;

$sql="SELECT * FROM op_lab_tests_taken op,patient_registration p WHERE op.patient_id=p.patient_id and op.lab_billno='{$bill_no}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
$row=mysqli_fetch_array($res);

	$send['patient_id']=$row['patient_id'];
	$send['patient_name']=$row['patient_name'];
	$send['phone']=$row['phone'];
	$send['date']=$row['date'];
	$send['gender']=$row['gender'];
	$send['lab_billno']=$row['lab_billno'];
	$send['paymentmode']=$row['paymentmode'];
	$send['age']=$row['age'];
	$send['amount']=$row['amount'];
	$send['balance']=$row['balance'];
	//$send['doctor_name']=$row['description'];
//	$scondstr=explode("fees ",$doctor_name);
//	$send['doctor_name']=$scondstr[1];
print json_encode($send);
?>