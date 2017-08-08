<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$to_date=$data->todate;

$from_date=$data->fromdate;
$recep_id=$data->recep_id;

if($recep_id=="All")
{
$sql="select op.bill_no,p1.patient_name as description, op.date,op.totalamt,op.paymentmode,op.cashamt as cashamt,op.cardamt as cardamt,op.balance as balance from op_make_payment op,patient_registration p1 where op.patient_id=p1.patient_id and op.date between '{$from_date}' and '{$to_date}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
	
	
	
}	
else
{
$sql="select op.bill_no,p1.patient_name as description, op.date,op.totalamt,op.paymentmode,op.cashamt as cashamt,op.cardamt as cardamt,op.balance as balance from op_make_payment op,patient_registration p1 where op.patient_id=p1.patient_id and op.user_id='{$recep_id}' and op.date between '{$from_date}' and '{$to_date}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

}
?>