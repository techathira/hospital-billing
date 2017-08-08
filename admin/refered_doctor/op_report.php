<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));

$to_date=$data->todate;

$from_date=$data->fromdate;
$recep_id=$data->ref_doc_id;

if($recep_id=="All")
{
$sql="select op.bill_no,p1.patient_name as description, op.date,op.totalamt,op.paymentmode,rd.ref_name from op_make_payment op,patient_registration p1,referal_doctor rd where op.patient_id=p1.patient_id and op.ref_doc_id>0 and op.ref_doc_id=rd.ref_doc_id and op.date between '{$from_date}' and '{$to_date}'";
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
$sql="select op.bill_no,p1.patient_name as description, op.date,op.totalamt,op.paymentmode,rd.ref_name from op_make_payment op,patient_registration p1,referal_doctor rd where op.patient_id=p1.patient_id and op.ref_doc_id>0 and op.ref_doc_id=rd.ref_doc_id and op.date between '{$from_date}' and '{$to_date}' and op.ref_doc_id='{$recep_id}'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);

}
?>