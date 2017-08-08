<?php


require_once("../../database.php");
$data1 = json_decode(file_get_contents("php://input"));

$bill_no=$data1->bill_no;


$sql="SELECT * FROM make_payment op,ip_bill_details bd WHERE op.bill_no='{$bill_no}' and op.bill_no=bd.bill_no";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}



print json_encode($send);

?>