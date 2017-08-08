<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$bill_no=$data->bill_no;
$amount=$data->amount;
$quantity=$data->quantity;
$sl_no=$data->sl_no;

$sql="update ip_bill_details";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
	while ($row = mysqli_fetch_array($res)) {
	  $send[] = $row;
	}

print json_encode($send);
?>