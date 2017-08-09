<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$to_date=$data->todate;

$from_date=$data->fromdate;
$recep_id=$data->recep_id;
if($recep_id=="All")
{
$sql="SELECT p.package_billno as bill_no,p3.patient_name as description,p.date,p.totalamount as totalamt,p.paymentmode,p.cashamt as cashamt,p.cardamt as cardamt,p.balance as balance from op_lab_package_taken p,patient_registration p3 where p.patient_id=p3.patient_id and p.date between '{$from_date}' and '{$to_date}' ";
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
$sql="SELECT p.package_billno as bill_no,p3.patient_name as description,p.date,p.totalamount as totalamt,p.paymentmode,p.cashamt as cashamt,p.cardamt as cardamt,p.balance as balance from op_lab_package_taken p,patient_registration p3 where p.patient_id=p3.patient_id and p.user_id='{$recep_id}' and p.date between '{$from_date}' and '{$to_date}'  ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
}
?>