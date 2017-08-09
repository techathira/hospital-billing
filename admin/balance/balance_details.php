<?php

require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$patient_id=$data->patient_id;


$sql="select op.bill_no as bill_no,pr.patient_id,CONCAT('OP ','Billing') as description,pr.patient_name,pr.phone,op.date,op.balance from op_make_payment op,patient_registration pr where op.patient_id='{$patient_id}' and op.balance > 0 and op.patient_id=pr.patient_id UNION select ip.bill_no as bill_no,pr.patient_id,CONCAT('IP ','Billing') as description,pr.patient_name,pr.phone,ip.date,ip.balance from make_payment ip,patient_registration pr where ip.patient_id='{$patient_id}' and ip.balance > 0 and ip.patient_id=pr.patient_id UNION select t.lab_billno as bill_no,pr.patient_id,CONCAT('TEST ','Billing') as description,pr.patient_name,pr.phone,t.date,t.balance from op_lab_tests_taken t,patient_registration pr where t.patient_id='{$patient_id}' and t.balance > 0 and t.patient_id=pr.patient_id UNION select p.package_billno as bill_no,pr.patient_id,CONCAT('PACKAGE ','Billing') as description,pr.patient_name,pr.phone,p.date,p.balance from op_lab_package_taken p,patient_registration pr where p.patient_id='{$patient_id}' and p.balance > 0 and p.patient_id=pr.patient_id";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
?>
