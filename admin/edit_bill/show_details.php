<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$bill_no=$data->bill_no;

$sql="select * from ip_bill_details where bill_no= '{$bill_no}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$sql_total="select sum(total) as total from ip_bill_details where bill_no= '{$bill_no}' ";
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