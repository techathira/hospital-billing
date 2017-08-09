<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$to_date=$data->todate;
$from_date=$data->fromdate;
$recep_id=$data->recep_id;
if($recep_id=="All")
{
$sql="SELECT t.lab_billno as bill_no,p4.patient_name as description,t.date,t.amount as totalamt,t.paymentmode,t.cashamt as cashamt,t.cardamt as cardamt,t.balance as balance from op_lab_tests_taken t,patient_registration p4 where t.patient_id=p4.patient_id and t.date between '{$from_date}' and '{$to_date}'";
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
$sql="SELECT t.lab_billno as bill_no,p4.patient_name as description,t.date,t.amount as totalamt,t.paymentmode,t.cashamt as cashamt,t.cardamt as cardamt,t.balance as balance from op_lab_tests_taken t,patient_registration p4 where t.patient_id=p4.patient_id and t.user_id='{$recep_id}' and t.date between '{$from_date}' and '{$to_date}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

}
?>