<?php

require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$bill_no=$data->bill_no;
$balance=$data->balance;
$select="SELECT cashamt,cardamt,totalamt,paymentmode FROM op_make_payment WHERE bill_no='{$bill_no}'";
$select_res=mysqli_query($con,$select) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_res);
$cash=$row['cashamt'];
$card=$row['cardamt'];
$amount=$row['totalamt'];
$paymentmode=$row['paymentmode'];
if($paymentmode=="Cash")
{
  $cashamt=$cash+$balance;
  $total=$amount+$balance
}
else if($paymentmode=="Card")
{
	$cardamt=$card+$balance;
    $total=$amount+$balance
}
else if($paymentmode=="Both")
{
	$cardamt=$card+$balance;
    $total=$amount+$balance
}

$sql="UPDATE op_make_payment SET balance='0',`ward_id`=[value-2],`status`=[value-3] WHERE 1"


?>