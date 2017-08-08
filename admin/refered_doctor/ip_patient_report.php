<?php
require_once("../../database.php");
$data = json_decode(file_get_contents("php://input"));
$fromdate=$data->fromdate;
$todate=$data->todate;
$recep_id=$data->ref_doc_id;

if($recep_id=="All")
{
$sql="select ip.bill_no,p1.patient_name as description, ip.date,ip.totalamt,ip.paymentmode,rd.ref_name from make_payment ip,patient_registration p1,referal_doctor rd where ip.patient_id=p1.patient_id and ip.ref_doc_id>0 and ip.ref_doc_id=rd.ref_doc_id and ip.date between '{$fromdate}'  and '{$todate}'";
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
	$sql="select ip.bill_no,p1.patient_name as description, ip.date,ip.totalamt,ip.paymentmode,rd.ref_name from make_payment ip,patient_registration p1,referal_doctor rd where ip.patient_id=p1.patient_id and ip.ref_doc_id>0 and ip.ref_doc_id=rd.ref_doc_id and ip.date between '{$fromdate}'  and '{$todate}' and ip.ref_doc_id='{$recep_id}' ";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
$send=array();
while($row=mysqli_fetch_array($res))
{
	$send[]=$row;
}
print json_encode($send);
}

?>