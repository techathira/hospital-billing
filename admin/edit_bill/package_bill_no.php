<?php
require_once("../../database.php");
header("Content-type: image/png");
$data = json_decode(file_get_contents("php://input"));

$bill_no=$data->bill_no;
$discount=$data->discount;
$total=$data->total;
$payment=$data->payment_mode;
$balance=$data->balance;
if($payment=="Both")
{
$cashamt=$data->display_pay_details->devidecash;
$cardamt=$total-$discount-$cashamt-$balance;
}
if($payment=="Cash")
{
$cashamt=$total-$discount-$balance;
$cardamt=0;
}
if($payment=="Card")
{
$cashamt=0;
$cardamt=$total-$discount-$balance;
}


$update="UPDATE op_lab_package_taken SET paymentmode='{$payment}',cashamt='{$cashamt}',cardamt='{$cardamt}',balance='{$balance}',totalamt='{$total}',discount='{$discount}' WHERE package_billno='{$bill_no}'";
$res_update=mysqli_query($con,$update) or die(mysqli_error($con));

?>
	