<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$bill_no=$data->bill_no;

$sql="select t.test_name,op.price from op_lab_tests_taken1 op,tests t where bill_no='{$bill_no}' and op.test_id=t.test_id ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$sql_total="select amount as total from op_lab_tests_taken where lab_billno= '{$bill_no}' ";
$res_total=mysqli_query($con,$sql_total) or die(mysqli_error($con));
$row_total = mysqli_fetch_array($res_total);

$total=$row_total['total'];

$send=array();
	while ($row = mysqli_fetch_array($res)) {
	  $send["billdetails"][] = $row;
	  
	}
	
	 $send["total"]["total"] = $total;
	

print json_encode($send);
?>