<?php


require_once("../../database.php");
$data1 = json_decode(file_get_contents("php://input"));

$bill_no=$data1->bill_no;


$sql="SELECT * FROM op_make_payment op,patient_registration p,op_bill_details bd WHERE op.patient_id=p.patient_id and op.bill_no='{$bill_no}' and op.bill_no=bd.bill_no";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}



print json_encode($send);

?>