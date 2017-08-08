<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$from_date=$data->fromdate;
$to_date=$data->todate;
$recep_id=$data->recep_id;

if($recep_id=="All")
{
$sql="select mp.bill_no,p2.patient_name as description, mp.date ,mp.totalamt,mp.paymentmode,mp.cashamt as cashamt,mp.cardamt as cardamt,mp.advance,mp.balance from make_payment mp,patient_registration p2 where mp.patient_id=p2.patient_id and mp.date between '{$from_date}' and '{$to_date}' GROUP by mp.bill_no";
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
	$sql="select mp.bill_no,p2.patient_name as description, mp.date ,mp.totalamt,mp.paymentmode,mp.cashamt as cashamt,mp.cardamt as cardamt,mp.advance,mp.balance from make_payment mp,patient_registration p2 where mp.patient_id=p2.patient_id and mp.user_id='{$recep_id}' and mp.date between '{$from_date}' and '{$to_date}' GROUP by mp.bill_no";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
}

?>