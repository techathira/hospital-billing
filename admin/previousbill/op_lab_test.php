<?php

require_once("../../database.php");
$data1 = json_decode(file_get_contents("php://input"));

$bill_no=$data1->lab_billno;


$sql="SELECT t.test_name,op.paymentmode,opt.price FROM op_lab_tests_taken op,op_lab_tests_taken1 opt,tests t WHERE op.lab_billno='{$bill_no}' and op.lab_billno=opt.bill_no and opt.test_id=t.test_id";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}



print json_encode($send);

?>