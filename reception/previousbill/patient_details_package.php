<?php

require_once("../../database.php");
$data1 = json_decode(file_get_contents("php://input"));

$bill_no=$data1->package_billno;

$sql="SELECT * FROM op_lab_package_taken op,patient_registration p WHERE op.patient_id=p.patient_id and op.package_billno='{$bill_no}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
$row=mysqli_fetch_array($res);

	$send['patient_id']=$row['patient_id'];
	$send['patient_name']=$row['patient_name'];
	$send['phone']=$row['phone'];
	$send['date']=$row['date'];
	$send['gender']=$row['gender'];
	$send['package_billno']=$row['package_billno'];
	$send['paymentmode']=$row['paymentmode'];
	$send['age']=$row['age'];
	$send['totalamount']=$row['totalamount'];
	$send['balance']=$row['balance'];
	$send['description']=$row['description'];
	$send['offer']=$row['offer'];
	
print json_encode($send);
?>